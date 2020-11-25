<?php $__env->startSection('content'); ?>
<body>
	<div id="wrapper">
		<?php echo $__env->make('sections.d_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
			  <?php if(session('error-status')): ?>
				  <div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <div class="container-fluid">
						<center><b>Error:</b> <?php echo e(session('error-status'), false); ?></center>
					  </div>
				  </div>
			  <?php endif; ?>
			  <?php if(session('success-status')): ?>
				  <div class="alert alert-success alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <div class="container-fluid">
					  <center><?php echo e(session('success-status'), false); ?></center>
					  </div>
				  </div>
			  <?php endif; ?>
              <div class="row">
              		<div class="col-md-8 col-md-offset-2">
                    	<div class="panel panel-default">
							<div class="panel-heading">User Detail
								<a href="#edit" data-toggle="modal" data-target="#edit" class="btn btn-xs btn-primary pull-right"><i class="fa fa-pencil"></i></a>
								<div id="edit" class="modal fade" role="dialog">
								  <div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Edit Profile</h4>
										 </div>
										 <div class="modal-body" style="overflow-y:auto;">
											 <form id="profile-form" class="form" role="form" method="POST" action="<?php echo e(url('/admin_profile/'.$user->id), false); ?>">
			                                     <?php echo e(csrf_field(), false); ?>


			                                     <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
			                                         <label class="control-label">Name</label>
			                                         <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e($user->name, false); ?>" required autofocus>
			                                         <?php if($errors->has('name')): ?>
			                                             <span class="label label-danger">
			                                             <strong><?php echo e($errors->first('name'), false); ?></strong>
			                                             </span>
			                                         <?php endif; ?>
			                                     </div>

			                                     <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
			                                         <label class="control-label">Phone Number</label>
			                                         <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo e($user->phone, false); ?>" name="phone" required>
			                                         <?php if($errors->has('phone')): ?>
			                                             <span class="label label-danger">
			                                             <strong><?php echo e($errors->first('phone'), false); ?></strong>
			                                             </span>
			                                         <?php endif; ?>
			                                     </div>

			                                     <div class="form-group">
			                                         <label class="control-label">Country<span style="color:red;">*</span></label>
			                                         <select class="form-control" name="country" value="<?php echo e($user->country, false); ?>">
			                                             <option value="Afghanistan"> Afghanistan </option>
			                                             <option value="Albania"> Albania </option>
			                                             <option value="Algeria"> Algeria </option>
			                                             <option value="American Samoa"> American Samoa </option>
			                                             <option value="Andorra"> Andorra </option>
			                                             <option value="Angola"> Angola </option>
			                                             <option value="Anguilla"> Anguilla </option>
			                                             <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
			                                             <option value="Argentina"> Argentina </option>
			                                             <option value="Armenia"> Armenia </option>
			                                             <option value="Aruba"> Aruba </option>
			                                             <option value="Australia"> Australia </option>
			                                             <option value="Austria"> Austria </option>
			                                             <option value="Azerbaijan"> Azerbaijan </option>
			                                             <option value="The Bahamas"> The Bahamas </option>
			                                             <option value="Bahrain"> Bahrain </option>
			                                             <option value="Bangladesh"> Bangladesh </option>
			                                             <option value="Barbados"> Barbados </option>
			                                             <option value="Belarus"> Belarus </option>
			                                             <option value="Belgium"> Belgium </option>
			                                             <option value="Belize"> Belize </option>
			                                             <option value="Benin"> Benin </option>
			                                             <option value="Bermuda"> Bermuda </option>
			                                             <option value="Bhutan"> Bhutan </option>
			                                             <option value="Bolivia"> Bolivia </option>
			                                             <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
			                                             <option value="Botswana"> Botswana </option>
			                                             <option value="Brazil"> Brazil </option>
			                                             <option value="Brunei"> Brunei </option>
			                                             <option value="Bulgaria"> Bulgaria </option>
			                                             <option value="Burkina Faso"> Burkina Faso </option>
			                                             <option value="Burundi"> Burundi </option>
			                                             <option value="Cambodia"> Cambodia </option>
			                                             <option value="Cameroon"> Cameroon </option>
			                                             <option value="Canada"> Canada </option>
			                                             <option value="Cape Verde"> Cape Verde </option>
			                                             <option value="Cayman Islands"> Cayman Islands </option>
			                                             <option value="Central African Republic"> Central African Republic </option>
			                                             <option value="Chad"> Chad </option>
			                                             <option value="Chile"> Chile </option>
			                                             <option value="People 's Republic of China"> People 's Republic of China </option>
			                                             <option value="Republic of China"> Republic of China </option>
			                                             <option value="Christmas Island"> Christmas Island </option>
			                                             <option value="Cocos(Keeling) Islands"> Cocos(Keeling) Islands </option>
			                                             <option value="Colombia"> Colombia </option>
			                                             <option value="Comoros"> Comoros </option>
			                                             <option value="Congo"> Congo </option>
			                                             <option value="Cook Islands"> Cook Islands </option>
			                                             <option value="Costa Rica"> Costa Rica </option>
			                                             <option value="Cote d'Ivoire"> Cote d'Ivoire </option>
			                                             <option value="Croatia"> Croatia </option>
			                                             <option value="Cuba"> Cuba </option>
			                                             <option value="Cyprus"> Cyprus </option>
			                                             <option value="Czech Republic"> Czech Republic </option>
			                                             <option value="Denmark"> Denmark </option>
			                                             <option value="Djibouti"> Djibouti </option>
			                                             <option value="Dominica"> Dominica </option>
			                                             <option value="Dominican Republic"> Dominican Republic </option>
			                                             <option value="Ecuador"> Ecuador </option>
			                                             <option value="Egypt"> Egypt </option>
			                                             <option value="El Salvador"> El Salvador </option>
			                                             <option value="Equatorial Guinea"> Equatorial Guinea </option>
			                                             <option value="Eritrea"> Eritrea </option>
			                                             <option value="Estonia"> Estonia </option>
			                                             <option value="Ethiopia"> Ethiopia </option>
			                                             <option value="Falkland Islands"> Falkland Islands </option>
			                                             <option value="Faroe Islands"> Faroe Islands </option>
			                                             <option value="Fiji"> Fiji </option>
			                                             <option value="Finland"> Finland </option>
			                                             <option value="France"> France </option>
			                                             <option value="French Polynesia"> French Polynesia </option>
			                                             <option value="Gabon"> Gabon </option>
			                                             <option value="The Gambia"> The Gambia </option>
			                                             <option value="Georgia"> Georgia </option>
			                                             <option value="Germany"> Germany </option>
			                                             <option value="Ghana"> Ghana </option>
			                                             <option value="Gibraltar"> Gibraltar </option>
			                                             <option value="Greece"> Greece </option>
			                                             <option value="Greenland"> Greenland </option>
			                                             <option value="Grenada"> Grenada </option>
			                                             <option value="Guadeloupe"> Guadeloupe </option>
			                                             <option value="Guam"> Guam </option>
			                                             <option value="Guatemala"> Guatemala </option>
			                                             <option value="Guernsey"> Guernsey </option>
			                                             <option value="Guinea"> Guinea </option>
			                                             <option value="Guinea - Bissau"> Guinea - Bissau </option>
			                                             <option value="Guyana"> Guyana </option>
			                                             <option value="Haiti"> Haiti </option>
			                                             <option value="Honduras"> Honduras </option>
			                                             <option value="Hong Kong"> Hong Kong </option>
			                                             <option value="Hungary"> Hungary </option>
			                                             <option value="Iceland"> Iceland </option>
			                                             <option value="India"> India </option>
			                                             <option value="Indonesia"> Indonesia </option>
			                                             <option value="Iran"> Iran </option>
			                                             <option value="Iraq"> Iraq </option>
			                                             <option value="Ireland"> Ireland </option>
			                                             <option value="Israel"> Israel </option>
			                                             <option value="Italy"> Italy </option>
			                                             <option value="Jamaica"> Jamaica </option>
			                                             <option value="Japan"> Japan </option>
			                                             <option value="Jersey"> Jersey </option>
			                                             <option value="Jordan"> Jordan </option>
			                                             <option value="Kazakhstan"> Kazakhstan </option>
			                                             <option value="Kenya"> Kenya </option>
			                                             <option value="Kiribati"> Kiribati </option>
			                                             <option value="North Korea"> North Korea </option>
			                                             <option value="South Korea"> South Korea </option>
			                                             <option value="Kosovo"> Kosovo </option>
			                                             <option value="Kuwait"> Kuwait </option>
			                                             <option value="Kyrgyzstan"> Kyrgyzstan </option>
			                                             <option value="Laos"> Laos </option>
			                                             <option value="Latvia"> Latvia </option>
			                                             <option value="Lebanon"> Lebanon </option>
			                                             <option value="Lesotho"> Lesotho </option>
			                                             <option value="Liberia"> Liberia </option>
			                                             <option value="Libya"> Libya </option>
			                                             <option value="Liechtenstein"> Liechtenstein </option>
			                                             <option value="Lithuania"> Lithuania </option>
			                                             <option value="Luxembourg"> Luxembourg </option>
			                                             <option value="Macau"> Macau </option>
			                                             <option value="Macedonia"> Macedonia </option>
			                                             <option value="Madagascar"> Madagascar </option>
			                                             <option value="Malawi"> Malawi </option>
			                                             <option value="Malaysia"> Malaysia </option>
			                                             <option value="Maldives"> Maldives </option>
			                                             <option value="Mali"> Mali </option>
			                                             <option value="Malta"> Malta </option>
			                                             <option value="Marshall Islands"> Marshall Islands </option>
			                                             <option value="Martinique"> Martinique </option>
			                                             <option value="Mauritania"> Mauritania </option>
			                                             <option value="Mauritius"> Mauritius </option>
			                                             <option value="Mayotte"> Mayotte </option>
			                                             <option value="Mexico"> Mexico </option>
			                                             <option value="Micronesia"> Micronesia </option>
			                                             <option value="Moldova"> Moldova </option>
			                                             <option value="Monaco"> Monaco </option>
			                                             <option value="Mongolia"> Mongolia </option>
			                                             <option value="Montenegro"> Montenegro </option>
			                                             <option value="Montserrat"> Montserrat </option>
			                                             <option value="Morocco"> Morocco </option>
			                                             <option value="Mozambique"> Mozambique </option>
			                                             <option value="Myanmar"> Myanmar </option>
			                                             <option value="Nagorno - Karabakh"> Nagorno - Karabakh </option>
			                                             <option value="Namibia"> Namibia </option>
			                                             <option value="Nauru"> Nauru </option>
			                                             <option value="Nepal"> Nepal </option>
			                                             <option value="Netherlands"> Netherlands </option>
			                                             <option value="Netherlands Antilles"> Netherlands Antilles </option>
			                                             <option value="New Caledonia"> New Caledonia </option>
			                                             <option value="New Zealand"> New Zealand </option>
			                                             <option value="Nicaragua"> Nicaragua </option>
			                                             <option value="Niger"> Niger </option>
			                                             <option value="Nigeria"> Nigeria </option>
			                                             <option value="Niue"> Niue </option>
			                                             <option value="Norfolk Island"> Norfolk Island </option>
			                                             <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
			                                             <option value="Northern Mariana"> Northern Mariana </option>
			                                             <option value="Norway"> Norway </option>
			                                             <option value="Oman"> Oman </option>
			                                             <option value="Pakistan"> Pakistan </option>
			                                             <option value="Palau"> Palau </option>
			                                             <option value="Palestine"> Palestine </option>
			                                             <option value="Panama"> Panama </option>
			                                             <option value="Papua New Guinea"> Papua New Guinea </option>
			                                             <option value="Paraguay"> Paraguay </option>
			                                             <option value="Peru"> Peru </option>
			                                             <option value="Philippines"> Philippines </option>
			                                             <option value="Pitcairn Islands"> Pitcairn Islands </option>
			                                             <option value="Poland"> Poland </option>
			                                             <option value="Portugal"> Portugal </option>
			                                             <option value="Puerto Rico"> Puerto Rico </option>
			                                             <option value="Qatar"> Qatar </option>
			                                             <option value="Romania"> Romania </option>
			                                             <option value="Russia"> Russia </option>
			                                             <option value="Rwanda"> Rwanda </option>
			                                             <option value="Saint Barthelemy"> Saint Barthelemy </option>
			                                             <option value="Saint Helena"> Saint Helena </option>
			                                             <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
			                                             <option value="Saint Lucia"> Saint Lucia </option>
			                                             <option value="Saint Martin"> Saint Martin </option>
			                                             <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
			                                             <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
			                                             <option value="Samoa"> Samoa </option>
			                                             <option value="San Marino"> San Marino </option>
			                                             <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
			                                             <option value="Saudi Arabia"> Saudi Arabia </option>
			                                             <option value="Senegal"> Senegal </option>
			                                             <option value="Serbia"> Serbia </option>
			                                             <option value="Seychelles"> Seychelles </option>
			                                             <option value="Sierra Leone"> Sierra Leone </option>
			                                             <option value="Singapore"> Singapore </option>
			                                             <option value="Slovakia"> Slovakia </option>
			                                             <option value="Slovenia"> Slovenia </option>
			                                             <option value="Solomon Islands"> Solomon Islands </option>
			                                             <option value="Somalia"> Somalia </option>
			                                             <option value="Somaliland"> Somaliland </option>
			                                             <option value="South Africa"> South Africa </option>
			                                             <option value="South Ossetia"> South Ossetia </option>
			                                             <option value="Spain"> Spain </option>
			                                             <option value="Sri Lanka"> Sri Lanka </option>
			                                             <option value="Sudan"> Sudan </option>
			                                             <option value="Suriname"> Suriname </option>
			                                             <option value="Svalbard"> Svalbard </option>
			                                             <option value="Swaziland"> Swaziland </option>
			                                             <option value="Sweden"> Sweden </option>
			                                             <option value="Switzerland"> Switzerland </option>
			                                             <option value="Syria"> Syria </option>
			                                             <option value="Taiwan"> Taiwan </option>
			                                             <option value="Tajikistan"> Tajikistan </option>
			                                             <option value="Tanzania"> Tanzania </option>
			                                             <option value="Thailand"> Thailand </option>
			                                             <option value="Timor - Leste"> Timor - Leste </option>
			                                             <option value="Togo"> Togo </option>
			                                             <option value="Tokelau"> Tokelau </option>
			                                             <option value="Tonga"> Tonga </option>
			                                             <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
			                                             <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
			                                             <option value="Tristan da Cunha"> Tristan da Cunha </option>
			                                             <option value="Tunisia"> Tunisia </option>
			                                             <option value="Turkey"> Turkey </option>
			                                             <option value="Turkmenistan"> Turkmenistan </option>
			                                             <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
			                                             <option value="Tuvalu"> Tuvalu </option>
			                                             <option value="Uganda"> Uganda </option>
			                                             <option value="Ukraine"> Ukraine </option>
			                                             <option value="United Arab Emirates"> United Arab Emirates </option>
			                                             <option value="United Kingdom"> United Kingdom </option>
			                                             <option value="United States"> United States </option>
			                                             <option value="Uruguay"> Uruguay </option>
			                                             <option value="Uzbekistan"> Uzbekistan </option>
			                                             <option value="Vanuatu"> Vanuatu </option>
			                                             <option value="Vatican City"> Vatican City </option>
			                                             <option value="Venezuela"> Venezuela </option>
			                                             <option value="Vietnam"> Vietnam </option>
			                                             <option value="British Virgin Islands"> British Virgin Islands </option>
			                                             <option value="Isle of Man"> Isle of Man </option>
			                                             <option value="US Virgin Islands"> US Virgin Islands </option>
			                                             <option value="Wallis and Futuna"> Wallis and Futuna </option>
			                                             <option value="Western Sahara"> Western Sahara </option>
			                                             <option value="Yemen"> Yemen </option>
			                                             <option value="Zambia"> Zambia </option>
			                                             <option value="Zimbabwe"> Zimbabwe </option>
			                                           </select>
			                                     </div>


			                                     <div class="form-group">
			                                         <label class="control-label">Bank</label>
			                                         <input type="text" class="form-control" placeholder="Bank Name" value="<?php echo e($user->bank_name, false); ?>" name="bank_name">
			                                         <?php if($errors->has('bank_name')): ?>
			                                             <span class="label label-danger">
			                                             <strong><?php echo e($errors->first('bank_name'), false); ?></strong>
			                                             </span>
			                                         <?php endif; ?>
			                                     </div>

			                                     <div class="form-group<?php echo e($errors->has('account_number') ? ' has-error' : '', false); ?>">
			                                         <label class="control-label">Account Number</label>
			                                         <input type="text" class="form-control" placeholder="Account Number" value="<?php echo e($user->account_number, false); ?>" name="account_number">
			                                         <?php if($errors->has('account_number')): ?>
			                                             <span class="label label-danger">
			                                             <strong><?php echo e($errors->first('account_number'), false); ?></strong>
			                                             </span>
			                                         <?php endif; ?>
			                                     </div>

			                                     <div class="form-group<?php echo e($errors->has('sort_code') ? ' has-error' : '', false); ?>">
			                                         <label class="control-label">Sort Code</label>
			                                         <input type="text" class="form-control" placeholder="Sort Code" value="<?php echo e($user->sort_code, false); ?>" name="sort_code">
			                                         <?php if($errors->has('sort_code')): ?>
			                                             <span class="label label-danger">
			                                             <strong><?php echo e($errors->first('sort_code'), false); ?></strong>
			                                             </span>
			                                         <?php endif; ?>
			                                     </div>

			                                     <div class="form-group<?php echo e($errors->has('bitcoin_wallet_id') ? ' has-error' : '', false); ?>">
			                                         <label class="control-label">Bitcoin Wallet ID</label>
			                                         <input type="text" class="form-control" placeholder="Bitcoin Wallet ID" value="<?php echo e($user->bitcoin_wallet_id, false); ?>" name="bitcoin_wallet_id">
			                                         <?php if($errors->has('bitcoin_wallet_id')): ?>
			                                             <span class="label label-danger">
			                                             <strong><?php echo e($errors->first('bitcoin_wallet_id'), false); ?></strong>
			                                             </span>
			                                         <?php endif; ?>
			                                     </div>

			                                     <div class="form-group">
			                                         <div class="col-sm-6 col-sm-offset-3">
			                                         <center>
			                                             <a onclick="submitForm(this);" form-id="profile-form" form-action="Save these changes" style="margin-top:20px;" type="submit" class="btn btn-danger">
			                                                 Save
			                                             </a>
			                                         </center>
			                                         </div>
			                                     </div>
			                                     </form>
										  </div>
										</div>
									</div>
								  </div>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr><td><b>Name</b></td><td> <?php echo e(isset($user->name) ? $user->name : '', false); ?><br /></td></tr>
											<tr><td><b>Email:</b></td><td><b><?php echo e($user->email, false); ?></b>
												<?php if(!$user->suspended): ?>
												<a href="/admin/user/<?php echo e($user->id, false); ?>/suspend" class="btn btn-xs btn-danger">Suspend</a>
												<?php else: ?>
												<a  href="/admin/user/<?php echo e($user->id, false); ?>/release" class="btn btn-xs btn-success">UnSuspend</a>
												<?php endif; ?>
											</td></tr>
											<tr><td><b>Account Number:</b></td><td><b><?php echo e($user->account_number, false); ?></b></td></tr>
											<tr><td><b>Bank:</b></td><td><b><?php echo e($user->bank_name, false); ?></b></td></tr>
											<tr><td><b>Phone:</b></td><td><b><?php echo e(isset($user->phone) ? $user->phone : '', false); ?></b></td></tr>
											<tr><td><b>Country:</b></td><td><b><?php echo e($user->country, false); ?></b></td></tr>
											<tr><td><b>Referred(Active):</b></td><td><b><?php echo e(\App\User::where('referrer_id', $user->id)->count(), false); ?></b>(<?php echo e($user->referred_count(), false); ?>)</td></tr>
                                            <tr><td><b>Total Active Shares:</b></td><td><?php echo $user->currency; ?><?php echo e(number_format(\App\Transaction::where('sender', $user->id)->where('status', 0)->where('receiver', 0)->sum('amount')), false); ?>

											<a class="btn btn-danger btn-xs" onclick="submitForm(this);" form-id="clear_shares_form" form-action="clear all user shares"><i class="fa fa-times"></i> Clear</a>
											<form style="display:none;" id="clear_shares_form" action="<?php echo e(url('/admin/clear_shares'), false); ?>" method="post" />
			                                <?php echo e(csrf_field(), false); ?>

			                                 <input type="hidden" name="user" value="<?php echo e($user->id, false); ?>" />
			                                </form>
											<a href="#" data-toggle="modal" data-target="#share-<?php echo e($user->id, false); ?>" class="btn btn-xs btn-primary">
												<i class="fa fa-plus"></i>
												Add Share
											</a>
											<div id="share-<?php echo e($user->id, false); ?>" class="modal fade" role="dialog">
											  <div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
													  <div class="modal-header">
														<h4 class="modal-title">Add Shares</h4>
													 </div>
													 <div class="modal-body">
															<form action="<?php echo e(url('/admin_add_shares'), false); ?>" method="POST">
																<?php echo e(csrf_field(), false); ?>

																<input type="hidden" name="user" value="<?php echo e($user->id, false); ?>">
																<div class="form-group">
																	<label class="control-label">Value of shares (<?php echo $user->currency; ?>):</label>
																	<input class="form-control" type="number" name="shares" />
																</div>
																<div class="form-group">
																	<label class="control-label">Type:</label>
																	<select name="type" class="form-control" value="1">
																		<option value="1">Shares Sold/Transferred</option>
																		<option value="2">Referral Bonus</option>
																		<option value="3">Executive Bonus</option>
																	</select>
																</div>
																<div class="form-group">
																	<label class="control-label">Referred Email (For Referral bonus only):</label>
																	<input class="form-control" type="text" name="email" placeholder="support@10in10trading.com" />
																</div>
																<div class="form-group">
																	<center>
																		<button type="submit" class="btn btn-sm btn-primary">Add</button>
																	</center>
																</div>
															</form>
													  </div>
													</div>
											    </div>
										  	  </div>
											  <a href="#" data-toggle="modal" data-target="#share-d-<?php echo e($user->id, false); ?>" class="btn btn-xs btn-warning">
  												<i class="fa fa-minus"></i>
  												Deduct Share
  											</a>
  											<div id="share-d-<?php echo e($user->id, false); ?>" class="modal fade" role="dialog">
  											  <div class="modal-dialog">
  													<!-- Modal content-->
  													<div class="modal-content">
  													  <div class="modal-header">
  														<h4 class="modal-title">Deduct Shares</h4>
  													 </div>
  													 <div class="modal-body">
  															<form action="<?php echo e(url('/admin_deduct_shares'), false); ?>" method="POST">
  																<?php echo e(csrf_field(), false); ?>

  																<input type="hidden" name="user" value="<?php echo e($user->id, false); ?>">
  																<div class="form-group">
  																	<label class="control-label">Value of shares to deduct(<?php echo $user->currency; ?>):</label>
  																	<input class="form-control" type="number" name="shares" />
  																</div>
  																<div class="form-group">
  																	<center>
  																		<button type="submit" class="btn btn-sm btn-primary">Deduct</button>
  																	</center>
  																</div>
  															</form>
  													  </div>
  													</div>
  											  </div>
										  </div>
									  	</div></td>
									</tr>
									<tr><td><b>Account Type:</b></td><td><b><?php echo e($user->is_executive ? 'EXECUTIVE':'NORMAL', false); ?></b>
										<a href="/admin/user/<?php echo e($user->id, false); ?>/switch_account" class="btn btn-xs btn-primary">Switch</a>
									</td></tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<a href="/admin/transactions?search=<?php echo e($user->email, false); ?>" class="btn btn-sm btn-primary">
										    View Transactions
										</a><br /><br />
									    </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 text-center">
										<a href="<?php echo e(url()->previous(), false); ?>" class="btn btn-sm btn-primary">
										    Return back
										</a><br /><br />
									    </div>
									</div>
								</div>
							</div>
						</div>
							<div class="panel panel-default">
								<div class="panel-heading">Referred Users</div>
								<div class="panel-body">
									<div style="margin:10px; overflow-x:auto;" class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>S/No</th>
													<th>Name</th>
													<th>Email</th>
													<th>Country</th>
													<th>Active Shares</th>
													<?php if(Auth::user()->isAdmin()): ?>
														<th>Action</th>
													<?php endif; ?>
												</tr>
											</thead>
											<tbody>
												<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
												<tr <?php if($u->suspended): ?> class="danger" <?php endif; ?>>
													<td class="col-md-1"><b><?php echo e($index+1, false); ?></b></td>
													<td class="col-md-2"><a href="<?php echo e(url('/admin/user/'.$u->id), false); ?>"><?php echo e($u->name, false); ?></a></td>
													<td class="col-md-2"><?php echo e($u->email, false); ?></td>
													<td class="col-md-1"><?php echo e($u->country, false); ?></td>
													<td class="col-md-2">
														<strong><?php echo $u->currency; ?><?php echo e(number_format(\App\Transaction::where('sender', $u->id)->where('status', 0)->where('receiver', 0)->sum('amount')), false); ?></strong>
													</td>
													<?php if(Auth::user()->isAdmin()): ?>
													<td class="col-md-1">
														<a onclick="submitUserForm(this);" id="<?php echo e($u->id, false); ?>" class="btn btn-sm btn-primary">
															Save
														</a>
														<?php if(!$u->isAdmin() && ($u->status_id == 4 || $u->status_id == 5)): ?>
														<a onclick="submitForm(this);" form-id="delete-form-<?php echo e($u->id, false); ?>" form-action="DELETE this user" class="btn btn-sm btn-primary">
															<i style="color:red;" class="fa fa-trash" aria-hidden="true"></i>
														</a>
														<form id="delete-form-<?php echo e($u->id, false); ?>" action="<?php echo e(url('/delete_user'), false); ?>" method="POST" style="display: none;">
															<?php echo e(csrf_field(), false); ?>

															<input type="hidden" name="user" value="<?php echo e($u->id, false); ?>" />
														</form>
														<?php endif; ?>
													</td>
													<?php endif; ?>
												</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
												<tr>
													<td colspan="6"><center><i>No users exist</i></center></td>
												</tr>
												<?php endif; ?>
											</tbody>
										</table>
										<?php echo e($users->links(), false); ?>

									</div>
								</div>
					</div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>