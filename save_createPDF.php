<?php
	$saveData = true;
	$testData = false;
	
	if ($testData) {
		$id = "testUser1";
		$_POST["submit"] = "Create PDF";
	} else {
		$id = $_POST["id"];
	}

	if ($saveData) {
		//Saving POST data from wizard to json
		$json = json_encode($_POST);

		$dir = "users/" . $id;

		if (!is_dir($dir)) {
			mkdir($dir);
		}

		$fp = fopen($dir . "/" . $id . ".json", "w");
		fwrite($fp, $json);
		fclose($fp);
	}

	if ($_POST["submit"] == "save") {
		header('Location: enter_test_id.php'); //redirect back to landing page (index.php)
	} else if ($_POST["submit"] == "finish") {
		createPDF($id); //generate PDF from json file
	}

	function createPDF($id) {
		/*
		This function generates a PDF document based on the information from /user/id/id.json file where id is the unique user identifier.
		*/
		$filename = "users/" . $id . "/" . $id . ".json";
		$file = file_get_contents($filename);
		$json = json_decode($file, true);
		
		$font = 'helvetica';
		$nameFontSize = 24;
		$headingFontSize = 14;
		$bodyFontSize = 10;
		$leftColWidth = 20;
		$midColWidthShort = 30;
		$midColWidthLong = 80;
		$rightColWidthLong = 150;
		$rightColWidthShort = 75;

		//PDF Generation using tcpdf
		require_once('TCPDF/tcpdf.php');
		require_once('TCPDF/config/tcpdf_config.php');

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor($json['firstName'] . ' ' . $json['lastName']);
		$pdf->SetTitle('Curriculum Vitae');

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// ---------------------------------------------------------

		// add a page
		$pdf->AddPage();

		// first and lastname at center of page
		$pdf->SetFont($font, 'B', $nameFontSize);
		$pdf->Write(0, $json['firstName'] . ' ' . $json['lastName'], '', 0, 'C', true, 0, false, false, 0);

		// Personal details
		$pdf->SetFont($font, '', $bodyFontSize);
		$address = '';
		if ($json['suburb'] != '') {
			$address = $address . $json['suburb'] . ', ';
		}
		if ($json['city'] != '') {
			$address = $address . $json['city'] . ', ';
		}
		$address = $address . $json['country'];
		$pdf->Write(0, $address, '', 0, 'C', true, 0, false, false, 0);

		$pdf->Write(0, ' ', '', 0, 'C', true, 0, false, false, 0);

		// set cell padding
		$pdf->setCellPaddings(1, 1, 1, 1);

		if ($json['age'] != '') {
			$pdf->MultiCell($leftColWidth, 0, 'Age:', 0, 'L', 0, 0);
			$pdf->MultiCell($rightColWidthShort, 0, $json['age'], 0, 'L', 0, 1);
		}

		$pdf->MultiCell($leftColWidth, 0, 'School:', 0, 'L', 0, 0);
		$pdf->MultiCell($rightColWidthShort, 0, $json['school'], 0, 'L', 0, 1);
		$pdf->MultiCell($leftColWidth, 0, 'License:', 0, 'L', 0, 0);
		$pdf->MultiCell($rightColWidthShort, 0, $json['license'], 0, 'L', 0, 1);
		$pdf->MultiCell($leftColWidth, 0, 'Phone:', 0, 'L', 0, 0);
		$pdf->MultiCell($rightColWidthShort, 0, $json['phoneNum'], 0, 'L', 0, 1);
		$pdf->MultiCell($leftColWidth, 0, 'E-mail:', 0, 'L', 0, 0);
		$pdf->MultiCell($rightColWidthShort, 0, $json['mail'], 0, 'L', 0, 1);
		
		if ($json['languages'][0]['language'] != "") {
			$pdf->MultiCell($leftColWidth, 0, 'Language:', 0, 'L', 0, 0);
			$txt = '';
			foreach ($json['languages'] as $languageObj) {
				$txt = $txt . $languageObj['language'] . "\n";
			}
			$pdf->MultiCell($rightColWidthShort, 0, $txt, 0, 'L', 0, 1);
		}

		$pdf->Write(0, '', '', 0, 1, true, 0, false, false, 0); // empty line

		// personal statement
		if ($json['statement'] != "") {
			$pdf->SetFont($font, 'B', $headingFontSize);
			$pdf->Write(0, 'Personal Statement', '', 0, 1, true, 0, false, false, 0);
			$pdf->writeHTML("<hr>", false, false, false, false, ''); // horizontal black line
			$pdf->ln(3); // Spacing before text
			$pdf->SetFont($font, '', $bodyFontSize);
			$pdf->Write(0, $json['statement'], '', 0, 1, true, 0, false, false, 0);
			$pdf->Write(0, ' ', '', 0, 'C', true, 0, false, false, 0); // empty line
			
		}

		// empolyment
		if ($json['employment'][0]['title'] != "" || $json['employment'][0]['jobCompany'] != "") {
			$pdf->SetFont($font, 'B', $headingFontSize);
			$pdf->Write(0, 'Employment', '', 0, 1, true, 0, false, false, 0);
			$pdf->writeHTML("<hr>", false, false, false, false, ''); // horizontal black line
			$pdf->ln(3); // Spacing before text
			foreach ($json['employment'] as $employmentObj) {
				if ($employmentObj['jobCompany'] != "" && $employmentObj['title'] != "") {
					$pdf->SetFont($font, 'B', $bodyFontSize);
					if ($employmentObj['endDate'] == "") {
						$endDate = "current";
					} else {
						$endDate = $employmentObj['endDate'];
					}

					if ($employmentObj['startDate'] == $endDate) {
						$txt = $employmentObj['title'] . ' | ' . $employmentObj['jobCompany'] . ' | ' . $employmentObj['startDate'];
					} else {
						$txt = $employmentObj['title'] . ' | ' . $employmentObj['jobCompany'] . ' | ' . $employmentObj['startDate'] . ' - ' . $endDate;
					}
					$pdf->Write(0, $txt, '', 0, 1, true, 0, false, false, 0);
					$pdf->SetFont($font, '', $bodyFontSize);
					/*
					$pdf->Write(0, $employmentObj['jobCompany'] . ' (' . $employmentObj['startDate'] . ' - ' . $employmentObj['endDate'] . ')', '', 0, 1, true, 0, false, false, 0);
					$pdf->Write(0, 'Role: ' . $employmentObj['title'], '', 0, 1, true, 0, false, false, 0);
					*/
					$pdf->Write(0, $employmentObj['jobDescription'], '', 0, 1, true, 0, false, false, 0);

					$pdf->Write(0, ' ', '', 0, 'C', true, 0, false, false, 0); // empty line
				}
			}
		}

		// volunteering
		if ($json['volunteering'][0]['volTitle'] != "" || $json['volunteering'][0]['volCompany'] != "") {
			$pdf->SetFont($font, 'B', $headingFontSize);
			$pdf->Write(0, 'Volunteer', '', 0, 1, true, 0, false, false, 0);
			$pdf->writeHTML("<hr>", false, false, false, false, ''); // horizontal black line
			$pdf->ln(3); // Spacing before text
			foreach ($json['volunteering'] as $volunteerObj) {
				if ($volunteerObj['volCompany'] != "" && $volunteerObj['volTitle'] != "") {
					$pdf->SetFont($font, 'B', $bodyFontSize);
					if ($volunteerObj['volEndDate'] == "") {
						$endDate = "current";
					} else {
						$endDate = $volunteerObj['volEndDate'];
					}

					if ($volunteerObj['volStartDate'] == $endDate) {
						$txt = $volunteerObj['volTitle'] . ' | ' . $volunteerObj['volCompany'] . ' | ' . $volunteerObj['volStartDate'];
					} else {
						$txt = $volunteerObj['volTitle'] . ' | ' . $volunteerObj['volCompany'] . ' | ' . $volunteerObj['volStartDate'] . ' - ' . $endDate;
					}
					
					$pdf->Write(0, $txt, '', 0, 1, true, 0, false, false, 0);
					$pdf->SetFont($font, '', $bodyFontSize);
					$pdf->Write(0, $volunteerObj['volDescription'], '', 0, 1, true, 0, false, false, 0);
					$pdf->Write(0, ' ', '', 0, 'C', true, 0, false, false, 0); // empty line
				}
			}
		}

		// education
		$pdf->SetFont($font, 'B', $headingFontSize);
		$pdf->Write(0, 'Education', '', 0, 1, true, 0, false, false, 0);
		$pdf->writeHTML("<hr>", false, false, false, false, ''); // horizontal black line
		$pdf->ln(3); // Spacing before text
		$pdf->SetFont($font, '', $bodyFontSize);
		foreach ($json['education'] as $educationObj) {
			$pdf->MultiCell($leftColWidth, 0, 'Year:', 0, 'L', 0, 0);
			$pdf->MultiCell($midColWidthShort, 0, $educationObj['schoolYear'], 0, 'L', 0, 0);
			$pdf->MultiCell($midColWidthLong, 0, $educationObj['schoolYearGrade'], 0, 'L', 0, 1);

			if ($educationObj['subjects'][0]['subject'] != "") {
				$pdf->MultiCell($leftColWidth, 0, 'Subjects:', 0, 'L', 0, 0);
				$pdf->MultiCell($midColWidthShort, 0, $educationObj['subjects'][0]['subject'], 0, 'L', 0, 0);
				$pdf->MultiCell($midColWidthLong, 0, $educationObj['subjects'][0]['grade'], 0, 'L', 0, 1);
				for ($i = 1; $i < count($educationObj['subjects']); $i++) {
					if ($educationObj['subjects'][$i]['subject'] != "") {
						$pdf->MultiCell($leftColWidth, 0, '', 0, 'L', 0, 0);
						$pdf->MultiCell($midColWidthShort, 0, $educationObj['subjects'][$i]['subject'], 0, 'L', 0, 0);
						$pdf->MultiCell($midColWidthLong, 0, $educationObj['subjects'][$i]['grade'], 0, 'L', 0, 1);
					}
				}
			
			}
			
			$pdf->Write(0, ' ', '', 0, 'C', true, 0, false, false, 0); // empty line
		}
		
		//Personal Qualities
		$pdf->SetFont($font, 'B', $headingFontSize);
		$pdf->Write(0, 'Personal Qualities', '', 0, 1, true, 0, false, false, 0);
		$pdf->writeHTML("<hr>", false, false, false, false, ''); // horizontal black line
		$pdf->ln(3); // Spacing before text
		$pdf->SetFont($font, '', $bodyFontSize);
		$counter = 0;
		if (isset($json['qualities'])) {
			foreach ($json['qualities'] as $personalQualitiesObj) {
				$newLine = 0;
				$counter++;
				if ($counter == 3 || $counter == count($json['qualities'])) {
					$newLine = 1;
				}
				$pdf->MultiCell(60, 0, $personalQualitiesObj['quality'], 0, 'L', 0, $newLine);
			}
			$pdf->Write(0, ' ', '', 0, 'C', true, 0, false, false, 0);  // empty line
		}
		
		// achievements
		if ($json['awards'][0]['awardYear'] != "" || $json['awards'][0]['award'] != "") {
			$pdf->SetFont($font, 'B', $headingFontSize);
			$pdf->Write(0, 'Awards', '', 0, 1, true, 0, false, false, 0);
			$pdf->writeHTML("<hr>", false, false, false, false, ''); // horizontal black line
			$pdf->ln(3); // Spacing before text
			$pdf->SetFont($font, '', $bodyFontSize);
			foreach ($json['awards'] as $achievementObj) {
				if ($achievementObj['awardYear'] != "" && $achievementObj['award'] != "") {
					$pdf->MultiCell($leftColWidth, 0, 'Year:', 0, 'L', 0, 0);
					$pdf->MultiCell($rightColWidthLong, 0, $achievementObj['awardYear'], 0, 'L', 0, 1);
					$pdf->MultiCell($leftColWidth, 0, 'Awards:', 0, 'L', 0, 0);
					$pdf->MultiCell($rightColWidthLong, 0, $achievementObj['award'], 0, 'L', 0, 1);
					$pdf->Write(0, '', '', 0, 1, true, 0, false, false, 0); // empty line
				}
			}
		}

		// extracurricular activities
		if ($json['extracur'][0]['extracurYear'] != "" || $json['extracur'][0]['activity'] != "") {
			$pdf->SetFont($font, 'B', $headingFontSize);
			$pdf->Write(0, 'Extracurricular Activities', '', 0, 1, true, 0, false, false, 0);
			$pdf->writeHTML("<hr>", false, false, false, false, ''); // horizontal black line
			$pdf->ln(3); // Spacing before text
			$pdf->SetFont($font, '', $bodyFontSize);
			foreach ($json['extracur'] as $extracurricularObj) {
				if ($extracurricularObj['extracurYear'] != "" && $extracurricularObj['activity'] != "") {
					$pdf->MultiCell($leftColWidth, 0, 'Year:', 0, 'L', 0, 0);
					$pdf->MultiCell($rightColWidthLong, 0, $extracurricularObj['extracurYear'], 0, 'L', 0, 1);
					$pdf->MultiCell($leftColWidth, 0, 'Activities:', 0, 'L', 0, 0);
					$pdf->MultiCell($rightColWidthLong, 0, $extracurricularObj['activity'], 0, 'L', 0, 1);
					$pdf->Write(0, '', '', 0, 1, true, 0, false, false, 0); // empty line
				}
			}
		}

		//referees
		$pdf->SetFont($font, 'B', $headingFontSize);
		$pdf->Write(0, 'Referees', '', 0, 1, true, 0, false, false, 0);
		$pdf->writeHTML("<hr>", false, false, false, false, ''); // horizontal black line
		$pdf->ln(3); // Spacing before text
		$pdf->SetFont($font, '', $bodyFontSize);
			foreach ($json['referees'] as $refereesObj) {
				if ($refereesObj['refName'] != "" ) {
				//if ($json['referees'][0]['refName'] != "") {
				$pdf->MultiCell($leftColWidth, 0, 'Name:', 0, 'L', 0, 0);
				$pdf->MultiCell($rightColWidthLong, 0, $refereesObj['refName'], 0, 'L', 0, 1);
				$pdf->MultiCell($leftColWidth, 0, 'Position:', 0, 'L', 0, 0);
				$pdf->MultiCell($rightColWidthLong, 0, $refereesObj['refPosition'], 0, 'L', 0, 1);
				$pdf->MultiCell($leftColWidth, 0, 'E-mail:', 0, 'L', 0, 0);
				$pdf->MultiCell($rightColWidthLong, 0, $refereesObj['refEmail'], 0, 'L', 0, 1);
				$pdf->MultiCell($leftColWidth, 0, 'Phone:', 0, 'L', 0, 0);
				$pdf->MultiCell($rightColWidthLong, 0, $refereesObj['refNum'], 0, 'L', 0, 1);
				$pdf->Write(0, '', '', 0, 1, true, 0, false, false, 0); // empty line
			}
			
		}

		//Close and output PDF document
		$pdf->Output($json['firstName'] . '_' . $json['lastName'] . '_CV.pdf', 'I');
	}
?>
	