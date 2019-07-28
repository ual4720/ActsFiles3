<div class="w3-row-padding">&nbsp;</div>
<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
	<div class="w3-card w3-container" style="min-height:400px">
		<h3><?php echo $person["first_name"]; ?> <?php echo $person["last_name"]; ?></h3>
		<h4><?php echo $person["nickname"]; ?></h4>
		<!--<i class="fa fa-user w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
		<img src="<?php echo $profiles; echo mt_rand(0, 8); ?>.jpg" class="w3-profile-100" title="<?php echo $person["first_name"] . " " . $person["last_name"]; ?>" />
		<p>Age: <?php echo $person["age"]; ?><?php echo date("(m-d-Y)", strtotime($person["birthday"])); ?></p>
		<p>Emergency Contact: </p>
		<p>1st Contact</p>
		<p>2nd Contact</p>
		<p>3rd Contact</p>
	</div>
</div>

<div class="w3-twothird">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3><?php echo $person["first_name"]; ?>'s Information</h3><br>
	
	<button onclick="myAccFunc('PersonalInformation')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align">Personal Information</button>
	<div id="PersonalInformation" class="w3-border w3-hide w3-show">
		<div class="w3-container">
			<form>
				<div class="w3-third">
					<div class="w3-container">
						<div class="w3-section w3-left-align">      
							<input class="w3-input" type="text" placeholder="First Name" value="<?php echo $person["first_name"]; ?>" />
							<label>First Name</label>
						</div>
					</div>
					<div class="w3-container">
						<div class="w3-section w3-left-align">      
							<input class="w3-input" type="text" placeholder="Middle Name" value="<?php echo $person["middle_name"]; ?>" />
							<label>Middle Name</label>
						</div>
					</div>
					<div class="w3-container">
						<div class="w3-section w3-left-align">      
							<input class="w3-input" type="text" placeholder="Last Name" value="<?php echo $person["last_name"]; ?>" />
							<label>Last Name</label>
						</div>
					</div>
				</div>
				<div class="w3-third">
					<div class="w3-container">
						<div class="w3-section w3-left-align">      
							<input class="w3-input" type="text" placeholder="Nickname" value="<?php echo $person["nickname"]; ?>" />
							<label>Nickname</label>
						</div>
					</div>
					<div class="w3-container">
						<div class="w3-section w3-left-align">      
							<input class="w3-input" type="text" placeholder="Ethinicity" value="<?php echo $person["ethnicity"]; ?>" />
							<label>Ethnicity</label>
						</div>
					</div>
					<div class="w3-container">
						<div class="w3-section w3-left-align">      
							<div class="w3-radio-container"><label><input id="male" class="w3-radio" type="radio" name="gender" value="M" <?php if($person["gender"] == "M") echo "checked"; ?> />
							Male </label></div>
							<div class="w3-radio-container"><label><input id="female" class="w3-radio" type="radio" name="gender" value="F" <?php if($person["gender"] == "F") echo "checked"; ?> />
							Female </label></div>
							<div class="w3-radio-container"><label><input id="unknown" class="w3-radio" type="radio" name="gender" value="U" <?php if($person["gender"] == "U") echo "checked"; ?> />
							Unknown</label></div>
							<br />
							<div class="w3-row-padding">&nbsp;</div>
							<label>Gender</label>
						</div>
					</div>
				</div>
				<div class="w3-third">
					<div class="w3-container">
						<div class="w3-section w3-left-align">
							<input class="w3-input w3-left" type="date" value="<?php echo $person["birthday"]; ?>">
							<label>Birthdate</label>
						</div>
					</div>
				</div>
				<div class="w3-container">
					<div class="w3-section w3-right-align">
						<button class="w3-btn w3-theme" type="reset">Reset</button>
						<button class="w3-btn w3-theme" type="submit">Save Changes</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="w3-row-padding">&nbsp;</div>
	<button onclick="myAccFunc('ContactInformation')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align">Contact Information</button>
	<div id="ContactInformation" class="w3-border w3-hide">
	  <div class="w3-container" style="overflow-x:auto;">
		<div class="w3-section" style="min-width:650px;">
			<table id="ContactInformationTable" class="w3-table table order-list">
				<thead>
					<tr>
						<td>Type</td>
						<td>Contact Data</td>
						<td>Primary</td>
						<td>Preferred</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<select name="contactType" data-placeholder="Choose a Type..." class="w3-select">
								<option value=""></option>
								<option value="mobile">mobile</option>
								<option value="email">email</option>
							</select>
						</td>
						<td>
							<input type="text" name="contactData"  class="w3-input"/>
						</td>
						<td>
							<input type="checkbox" name="contactPrimary" class="w3-check" />
						</td>
						<td>
							<input type="checkbox" name="contactPreferred" class="w3-check" />
						</td>
						<td>
							&nbsp;
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" style="text-align: left;">
							<input type="button" class="w3-btn w3-theme" id="addContactRow" value="Add Row" />
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<div class="w3-container">
								<div class="w3-section w3-right-align">
									<button class="w3-btn w3-theme" type="reset">Reset</button>
									<button class="w3-btn w3-theme" type="submit">Save Changes</button>
								</div>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	  </div>
	</div>
	<div class="w3-row-padding">&nbsp;</div>
	<button onclick="myAccFunc('AddressInformation')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align">Address Information</button>
	<div id="AddressInformation" class="w3-border w3-hide">
	<div class="w3-container" style="overflow-x:auto;">
		<div class="w3-section" style="min-width:650px;">
			<table id="AddressInformationTable" class="w3-table table order-list">
				<thead>
					<tr>
						<td>Type</td>
						<td>Address</td>
						<td>Home</td>
						<td>Mailing</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<select name="addressType" data-placeholder="Choose a Type..." class="w3-select">
								<option value=""></option>
								<option value="physical">mobile</option>
								<option value="mailing">email</option>
							</select>
						</td>
						<td>
							<input type="text" name="addressID"  class="w3-input"/>
						</td>
						<td>
							<input type="checkbox" name="addressHome" class="w3-check" />
						</td>
						<td>
							<input type="checkbox" name="addressMailing" class="w3-check" />
						</td>
						<td>
							&nbsp;
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" style="text-align: left;">
							<input type="button" class="w3-btn w3-theme" id="addAddressRow" value="Add Row" />
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<div class="w3-container">
								<div class="w3-section w3-right-align">
									<button class="w3-btn w3-theme" type="reset">Reset</button>
									<button class="w3-btn w3-theme" type="submit">Save Changes</button>
								</div>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	  </div>
	</div>
	<div class="w3-row-padding">&nbsp;</div>
	<button onclick="myAccFunc('FamilyInformation')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align">Family Information</button>
	<div id="FamilyInformation" class="w3-border w3-hide">
	  <div class="w3-container">
		<div class="w3-third">
			<div class="w3-container">
				<h4>Current Families</h4>
				<select id="DropdownCurrentFamilies" data-placeholder="Choose a Person..." class="select2" multiple="">
					<option value=""></option>
				</select>
				<div class="w3-section w3-center-align">
					<button class="w3-btn w3-theme">Reset</button>
					<button class="w3-btn w3-theme" type="submit">Save Changes</button>
				</div>
				<div class="w3-row-padding">&nbsp;</div>
			</div>
		</div>
		<div class="w3-twothird">
			<div class="w3-container">
				<h4>Family Members</h4>
				<button onclick="myAccFunc('FamilyName1')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align">[1st Family Name]</button>
				<div id="FamilyName1" class="w3-border w3-hide w3-show">
					<ul class="w3-ul w3-margin-bottom">
					  <li>Relation 1</li>
					  <li>Relation 2</li>
					  <li>Relation 3</li>
					</ul>
				</div>
				<div class="w3-row-padding">&nbsp;</div>
				<button onclick="myAccFunc('FamilyName2')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align">[2nd Family Name]</button>
				<div id="FamilyName2" class="w3-border w3-hide">
					<ul class="w3-ul w3-margin-bottom">
					  <li>Relation 1</li>
					  <li>Relation 2</li>
					</ul>
				</div>
				<div class="w3-row-padding">&nbsp;</div>
			</div>
		</div>
		<div class="w3-row-padding">&nbsp;</div>
	  </div>
	</div>
	<div class="w3-row-padding">&nbsp;</div>
	<button onclick="myAccFunc('MedicalInformation')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align">Medical Information</button>
	<div id="MedicalInformation" class="w3-border w3-hide w3-black">
	  <div class="w3-container">
		<p>Accordion with Images:</p>
		<p>French Alps</p>
	  </div>
	</div>
	<div class="w3-row-padding">&nbsp;</div>
	<button onclick="myAccFunc('Attachments')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align">Attachments</button>
	<div id="Attachments" class="w3-border w3-hide">
	  <div class="w3-container" style="overflow-x:auto;">
		<p>[API PLUGIN TO GOOGLE DRIVE FOR FILE ACCESS/STORAGE]</p>
		<table class="w3-table w3-table-all w3-striped w3-bordered">
			<thead>
			<tr class="w3-theme">
			  <th class="w3-center"><a href="#" target="_blank" title="Add New File"><i class="fa fa-plus-square-o"></i> New File</a></th>
			  <th>File Name</th>
			  <th>Description</th>
			  <th class="w3-center">Upload Date</th>
			  <th class="w3-center">Last Modified</th>
			  <th class="w3-center">Actions</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="w3-center"><a href="" target="_blank" title="Open Attachment"><img src="<?php echo $images; ?>google_drive_icons/gdoc.png" class="attachment-icon" /></a></td>
				<td>Mariners/Wild Waves - 2019</td>
				<td>Permission Slip</td>
				<td class="w3-center">04/10/2019</td>
				<td class="w3-center">04/24/2019</td>
				<td class="w3-center">
					<a href="#" target="_blank" title="Open Folder"><i class="fa fa-folder-open-o"></i></a> | <a href="#" target="_blank" title="Delete File"><i class="fa fa-trash-o"></i></a>
				</td>
			</tr>
			<tr>
				<td class="w3-center"><a href="" target="_blank" title="Open Attachment"><img src="<?php echo $images; ?>google_drive_icons/gsheet.png" class="attachment-icon" /></a></td>
				<td>Detailed List</td>
				<td>Other</td>
				<td class="w3-center">06/24/2017</td>
				<td class="w3-center">06/24/2017</td>
				<td class="w3-center">
					<a href="#" target="_blank" title="Open Folder"><i class="fa fa-folder-open-o"></i></a> | <a href="#" target="_blank" title="Delete File"><i class="fa fa-trash-o"></i></a>
				</td>
			</tr>
			<tr>
				<td class="w3-center"><a href="" target="_blank" title="Open Attachment"><img src="<?php echo $images; ?>google_drive_icons/word.png" class="attachment-icon" /></a></td>
				<td>2018 Leadership Development Agreement</td>
				<td>Volunteer Agreement</td>
				<td class="w3-center">12/24/2017</td>
				<td class="w3-center">01/19/2018</td>
				<td class="w3-center">
					<a href="#" target="_blank" title="Open Folder"><i class="fa fa-folder-open-o"></i></a> | <a href="#" target="_blank" title="Delete File"><i class="fa fa-trash-o"></i></a>
				</td>
			</tr>
		</table>
	  </div>
	  <div class="w3-row-padding">&nbsp;</div>
	</div>
	<div class="w3-row-padding">&nbsp;</div>
  </div>
</div>
</div>