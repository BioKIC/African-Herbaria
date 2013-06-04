<?php
if(!$displayQuery && array_key_exists('displayquery',$_REQUEST)) $displayQuery = $_REQUEST['displayquery'];

$qIdentifier=''; $qOtherCatalogNumbers=''; 
$qRecordedBy=''; $qRecordNumber=''; $qEventDate=''; 
$qEnteredBy=''; $qObserverUid='';$qProcessingStatus=''; $qDateLastModified='';
$qImgOnly='';
$qCustomField1='';$qCustomType1='';$qCustomValue1='';
$qCustomField2='';$qCustomType2='';$qCustomValue2='';
$qCustomField3='';$qCustomType3='';$qCustomValue3='';
$qryArr = $occManager->getQueryVariables();
if($qryArr){
	$qIdentifier = (array_key_exists('id',$qryArr)?$qryArr['id']:'');
	$qOtherCatalogNumbers = (array_key_exists('ocn',$qryArr)?$qryArr['ocn']:'');
	$qRecordedBy = (array_key_exists('rb',$qryArr)?$qryArr['rb']:'');
	$qRecordNumber = (array_key_exists('rn',$qryArr)?$qryArr['rn']:'');
	$qEventDate = (array_key_exists('ed',$qryArr)?$qryArr['ed']:'');
	$qEnteredBy = (array_key_exists('eb',$qryArr)?$qryArr['eb']:'');
	$qObserverUid = (array_key_exists('ouid',$qryArr)?$qryArr['ouid']:0);
	$qProcessingStatus = (array_key_exists('ps',$qryArr)?$qryArr['ps']:'');
	$qDateLastModified = (array_key_exists('dm',$qryArr)?$qryArr['dm']:'');
	$qImgOnly = (array_key_exists('io',$qryArr)?$qryArr['io']:0);
	$qCustomField1 = (array_key_exists('cf1',$qryArr)?$qryArr['cf1']:'');
	$qCustomType1 = (array_key_exists('ct1',$qryArr)?$qryArr['ct1']:'');
	$qCustomValue1 = (array_key_exists('cv1',$qryArr)?$qryArr['cv1']:'');
	$qCustomField2 = (array_key_exists('cf2',$qryArr)?$qryArr['cf2']:'');
	$qCustomType2 = (array_key_exists('ct2',$qryArr)?$qryArr['ct2']:'');
	$qCustomValue2 = (array_key_exists('cv2',$qryArr)?$qryArr['cv2']:'');
	$qCustomField3 = (array_key_exists('cf3',$qryArr)?$qryArr['cf3']:'');
	$qCustomType3 = (array_key_exists('ct3',$qryArr)?$qryArr['ct3']:'');
	$qCustomValue3 = (array_key_exists('cv3',$qryArr)?$qryArr['cv3']:'');
	$qOcrFrag = (array_key_exists('ocr',$qryArr)?$qryArr['ocr']:'');
}
//Set processing status  
$processingStatusArr = array();
if(isset($PROCESSINGSTATUS) && $PROCESSINGSTATUS){
	$processingStatusArr = $PROCESSINGSTATUS;
}
else{
	$processingStatusArr = array('unprocessed','unprocessed/NLP','stage 1','stage 2','stage 3','pending duplicate','pending review','expert required','reviewed','closed');
}
?>
<div id="querydiv" style="clear:both;width:790px;display:<?php echo ($displayQuery?'block':'none'); ?>;">
	<form name="queryform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return verifyQueryForm(this)">
		<fieldset style="padding:5px;">
			<legend><b>Record Search Form</b></legend>
			<?php 
			if(!$crowdSourceMode){
				?>
				<div style="margin:2px;">
					<span title="Full name of collector as entered in database. To search just on last name, place the wildcard character (%) before name (%Gentry).">
						Collector: 
						<input type="text" name="q_recordedby" value="<?php echo $qRecordedBy; ?>" />
					</span>
					<span style="margin-left:25px;">Number:</span>
					<span title="Separate multiple terms by comma and ranges by ' - ' (space before and after dash required), e.g.: 3542,3602,3700 - 3750">
						<input type="text" name="q_recordnumber" value="<?php echo $qRecordNumber; ?>" style="width:120px;" />
					</span>
					<span style="margin-left:15px;" title="Enter ranges separated by ' - ' (space before and after dash required), e.g.: 2002-01-01 - 2003-01-01">
						Date: 
						<input type="text" name="q_eventdate" value="<?php echo $qEventDate; ?>" style="width:160px" />
					</span>
				</div>
				<?php 
			}
			?>
			<div style="margin:2px;">
				Catalog Number: 
				<span title="Separate multiples by comma and ranges by ' - ' (space before and after dash required), e.g.: 3542,3602,3700 - 3750">
					<input type="text" name="q_identifier" value="<?php echo $qIdentifier; ?>" />
				</span>
				<?php 
				if($crowdSourceMode){
					?>
					<span style="margin-left:25px;">OCR Fragment:</span> 
					<span title="Search for term embedded within OCR block of text">
						<input type="text" name="q_ocrfrag" value="<?php echo $qOcrFrag; ?>" style="width:200px;" />
					</span>
					<?php 
				}
				else{
					?>
					<span style="margin-left:25px;">Other Catalog Numbers:</span> 
					<span title="Separate multiples by comma and ranges by ' - ' (space before and after dash required), e.g.: 3542,3602,3700 - 3750">
						<input type="text" name="q_othercatalognumbers" value="<?php echo $qOtherCatalogNumbers; ?>" />
					</span>
					<?php
				}
				?>
			</div>
			<?php 
			if(!$crowdSourceMode){
				?>
				<div style="margin:2px;">
					<?php
					if($isGenObs && $isAdmin){
						?>
						<span style="margin-right:25px;">
							<input type="checkbox" name="q_observeruid" value="<?php echo $symbUid; ?>" <?php echo ($qObserverUid?'CHECKED':''); ?> />
							Only My Records
						</span>
						<?php 
					}
					else{
						?>
						<input type="hidden" name="q_observeruid" value="<?php echo $isGenObs?$symbUid:''; ?>" />
						<?php 
					}
					?>
					<span style="margin-right:15px;<?php echo ($isGenObs?'display:none':''); ?>">
						Entered by: 
						<input type="text" name="q_enteredby" value="<?php echo $qEnteredBy; ?>" />
					</span>
					<span title="Enter ranges separated by ' - ' (space before and after dash required), e.g.: 2002-01-01 - 2003-01-01">
						Date entered: 
						<input type="text" name="q_datelastmodified" value="<?php echo $qDateLastModified; ?>" style="width:160px" />
					</span>
					<span style="margin-left:15px;">Status:</span> 
					<select name="q_processingstatus">
						<option value=''>All Records</option>
						<option>-------------------</option>
						<?php 
						foreach($processingStatusArr as $v){
							//Don't display these options is editor is crowd sourced 
							$keyOut = strtolower($v);
							echo '<option value="'.$keyOut.'" '.($qProcessingStatus==$keyOut?'SELECTED':'').'>'.ucwords($v).'</option>';
						}
						?>
					</select>
				</div>
				<?php
			}
			$advFieldArr = array();
			if($crowdSourceMode){
				$advFieldArr = array('family'=>'Family','sciname'=>'Scientific Name','othercatalognumbers'=>'Other Catalog Numbers',
					'country'=>'Country','stateProvince'=>'State/Province','county'=>'County','municipality'=>'Municipality',
					'recordedby'=>'Collector','recordnumber'=>'Collector Number','eventdate'=>'Collection Date');
			}
			else{
				$advFieldArr = array('family'=>'Family','sciname'=>'Scientific Name','identifiedBy'=>'Identified By',
					'identificationReferences'=>'Identification References','identificationRemarks'=>'Identification Remarks',
					'identificationQualifier'=>'Identification Qualifier','typeStatus'=>'Type Status','associatedCollectors'=>'Associated Collectors',
					'verbatimEventDate'=>'Verbatim Event Date','habitat'=>'Habitat','substrate'=>'Substrate','occurrenceRemarks'=>'Occurrence Remarks',
					'associatedTaxa'=>'Associated Taxa','verbatimAttributes'=>'Description','reproductiveCondition'=>'Reproductive Condition',
					'establishmentMeans'=>'Establishment Means','lifeStage'=>'Life Stage','sex'=>'Sex','individualCount'=>'Individual Count','samplingProtocol'=>'Sampling Protocol',
					'country'=>'Country','stateProvince'=>'State/Province','county'=>'County','municipality'=>'Municipality','locality'=>'Locality',
					'decimalLatitude'=>'Decimal Latitude','decimalLongitude'=>'Decimal Longitude','geodeticDatum'=>'Geodetic Datum',
					'coordinateUncertaintyInMeters'=>'Uncertainty (m)','verbatimCoordinates'=>'Verbatim Coordinates','georeferencedBy'=>'Georeferenced By',
					'georeferenceProtocol'=>'Georeference Protocol','georeferenceSources'=>'Georeference Sources',
					'georeferenceVerificationStatus'=>'Georeference Verification Status','georeferenceRemarks'=>'Georeference Remarks',
					'minimumElevationInMeters'=>'Elevation Minimum (m)','maximumElevationInMeters'=>'Elevation Maximum (m)',
					'verbatimElevation'=>'Verbatim Elevation','disposition'=>'Disposition','ocrFragment'=>'OCR Fragment');
			}
			//sort($advFieldArr);
			?>
			<div style="margin:2px 0px;">
				Custom Field 1: 
				<select name="q_customfield1">
					<option value="">Select Field Name</option>
					<option value="">---------------------------------</option>
					<?php 
					foreach($advFieldArr as $k => $v){
						echo '<option value="'.$k.'" '.($k==$qCustomField1?'SELECTED':'').'>'.$v.'</option>';
					}
					?>
				</select>
				<select name="q_customtype1">
					<option>EQUALS</option>
					<option <?php echo ($qCustomType1=='STARTS'?'SELECTED':''); ?> value="STARTS">STARTS WITH</option>
					<option <?php echo ($qCustomType1=='LIKE'?'SELECTED':''); ?> value="LIKE">CONTAINS</option>
					<option <?php echo ($qCustomType1=='NULL'?'SELECTED':''); ?> value="NULL">IS NULL</option>
					<option <?php echo ($qCustomType1=='NOTNULL'?'SELECTED':''); ?> value="NOTNULL">IS NOT NULL</option>
				</select>
				<input name="q_customvalue1" type="text" value="<?php echo $qCustomValue1; ?>" style="width:200px;" />
				<a href="#" onclick="toggleCustomDiv2();return false;">
					<img src="../../images/editplus.png" />
				</a>
			</div>
			<div id="customdiv2" style="margin:2px 0px;display:<?php echo ($qCustomValue2||$qCustomType2=='IS NULL'?'block':'none');?>;">
				Custom Field 2: 
				<select name="q_customfield2">
					<option value="">Select Field Name</option>
					<option value="">---------------------------------</option>
					<?php 
					foreach($advFieldArr as $k => $v){
						echo '<option value="'.$k.'" '.($k==$qCustomField2?'SELECTED':'').'>'.$v.'</option>';
					}
					?>
				</select>
				<select name="q_customtype2">
					<option>EQUALS</option>
					<option <?php echo ($qCustomType2=='STARTS'?'SELECTED':''); ?> value="STARTS">STARTS WITH</option>
					<option <?php echo ($qCustomType2=='LIKE'?'SELECTED':''); ?> value="LIKE">CONTAINS</option>
					<option <?php echo ($qCustomType2=='NULL'?'SELECTED':''); ?> value="NULL">IS NULL</option>
					<option <?php echo ($qCustomType2=='NOTNULL'?'SELECTED':''); ?> value="NOTNULL">IS NOT NULL</option>
				</select>
				<input name="q_customvalue2" type="text" value="<?php echo $qCustomValue2; ?>" style="width:200px;" />
				<a href="#" onclick="toggleCustomDiv3();return false;">
					<img src="../../images/editplus.png" />
				</a>
			</div>
			<div id="customdiv3" style="margin:2px 0px;display:<?php echo ($qCustomValue3||$qCustomType3=='IS NULL'?'block':'none');?>;">
				Custom Field 3: 
				<select name="q_customfield3">
					<option value="">Select Field Name</option>
					<option value="">---------------------------------</option>
					<?php 
					foreach($advFieldArr as $k => $v){
						echo '<option value="'.$k.'" '.($k==$qCustomField3?'SELECTED':'').'>'.$v.'</option>';
					}
					?>
				</select>
				<select name="q_customtype3">
					<option>EQUALS</option>
					<option <?php echo ($qCustomType3=='STARTS'?'SELECTED':''); ?> value="STARTS">STARTS WITH</option>
					<option <?php echo ($qCustomType3=='LIKE'?'SELECTED':''); ?> value="LIKE">CONTAINS</option>
					<option <?php echo ($qCustomType3=='NULL'?'SELECTED':''); ?> value="NULL">IS NULL</option>
					<option <?php echo ($qCustomType3=='NOTNULL'?'SELECTED':''); ?> value="NOTNULL">IS NOT NULL</option>
				</select>
				<input name="q_customvalue3" type="text" value="<?php echo $qCustomValue3; ?>" style="width:200px;" />
			</div>
			<?php 
			if(!$crowdSourceMode){
				$qryStr = '';
				if($qRecordedBy) $qryStr .= '&recordedby='.$qRecordedBy;
				if($qRecordNumber) $qryStr .= '&recordnumber='.$qRecordNumber;
				if($qEventDate) $qryStr .= '&eventdate='.$qEventDate;
				if($qIdentifier) $qryStr .= '&identifier='.$qIdentifier;
				if($qOtherCatalogNumbers) $qryStr .= '&othercatalognumbers='.$qOtherCatalogNumbers;
				if($qEnteredBy) $qryStr .= '&recordenteredby='.$qEnteredBy;
				if($qObserverUid) $qryStr .= '&observeruid='.$qObserverUid;
				if($qDateLastModified) $qryStr .= '&datelastmodified='.$qDateLastModified;
				if($qryStr){
					?>
					<div style="float:right;margin-top:10px;" title="Go to Label Printing Module">
						<a href="../datasets/index.php?collid=<?php echo $collId.$qryStr; ?>">
							<img src="../../images/list.png" style="width:15px;" />
						</a>
					</div>
					<?php 
				}
			}
			?>
			<div style="margin:5px 120px 5px 0px;float:right;">
				<input type="hidden" name="collid" value="<?php echo $collId; ?>" />
				<input type="hidden" name="csmode" value="<?php echo $crowdSourceMode; ?>" />
				<input type="hidden" name="occid" value="" />
				<input type="hidden" name="occindex" value="0" />
				<input type="hidden" name="autoprocessingstatus" value="<?php echo (isset($autoPStatus)?$autoPStatus:''); ?>" />
				<input type="hidden" name="autodupe" value="<?php echo (isset($autoDupeSearch)?$autoDupeSearch:0); ?>" />
				<input type="button" name="submitaction" value="Display Editor" onclick="submitQueryEditor(this.form)" />
				<input type="button" name="submitaction" value="Display Table" onclick="submitQueryTable(this.form)" />
				<span style="margin-left:10px;">
					<input type="button" name="reset" value="Reset Form" onclick="resetQueryForm(this.form)" /> 
				</span>
			</div>
			<div style="margin:5px 0px;">
				<input name="q_imgonly" type="checkbox" value="1" <?php echo ($qImgOnly==1?'checked':''); ?> /> 
				Only occurrences with images
			</div>
		</fieldset>
	</form>
</div>
