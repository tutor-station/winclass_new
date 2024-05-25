
<?php $__env->startSection('title', 'Add jitsi meeting - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Create Jitsi Meeting';
$data['title'] = 'Meetings';
$data['title1'] = 'Jitsi Meetings';
$data['title2'] = 'Create Jitsi Meeting';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
	<?php if($errors->any()): ?>  
	<div class="alert alert-danger" role="alert">
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
	<p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
	<span aria-hidden="true" style="color:red;">&times;</span></button></p>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
	</div>
	<?php endif; ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Create Jitsi Meeting')); ?></h5>
		  <div>
			<div class="widgetbar">
			  <a href="<?php echo e(url('jitsi-dashboard')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Close')); ?>"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
			</div>                        
		  </div>
        </div>
        <div class="card-body">
			<form autocomplete="off" action="<?php echo e(route('jitsi.meeting.save')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="form-group col-md-4">
                    	<label for="image"><?php echo e(__('Image')); ?>:</label><br>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
							</div>
							<div class="custom-file">
							  <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
							  <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
							</div>
						  </div>
						</div>
						<div class="form-group col-md-4">
						<label for="exampleInputDetails"><?php echo e(__('Link By Course')); ?>:</label><br>
					<input type="checkbox" id="myCheck" name="link_by" class="custom_toggle" onclick="myFunction()">
					   </div>
					      <div class="form-group col-md-4">
            			<div style="display: none" id="update-password">
							<label><?php echo e(__('Courses')); ?>:<span class="redstar">*</span></label>
							<select name="course_id" id="course_id" class="form-control select2">
			                    <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                      <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
			                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                </select>
			            </div>
					</div>

					<div class="form-group col-md-3">
						<label>
							<?php echo e(__('Meeting Topic')); ?>:<sup class="redstar">*</sup>
						</label>

						<input type="text" name="topic" placeholder="Ex. My Meeting" class="form-control" >
					</div>

					<br>


					<div class="form-group col-md-3" id="sec4_four">
						<label>
							<?php echo e(__('Meeting Start Time')); ?>:<sup class="redstar">*</sup>
						</label>

						<div class="input-group">
							<input  name="start_time" type="text" id="time-format" class="form-control" placeholder="dd/mm/yyyy - hh:ii aa" aria-describedby="basic-addon5" />
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon5"><i class="feather icon-calendar"></i></span>
							</div>
						</div>
					</div>

					<div class="form-group col-md-3" id="sec5_four">
						<label>
							<?php echo e(__('Meeting End Time')); ?>:<sup class="redstar">*</sup>
						</label>

                        <div class="input-group">
							<input  name="end_time" type="text" id="time-format1" class="form-control" placeholder="dd/mm/yyyy - hh:ii aa" aria-describedby="basic-addon5" />
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon5"><i class="feather icon-calendar"></i></span>
							</div>
						</div>
					</div>

					<div class="form-group col-md-3" id="sec3_three">
						<label>
							<?php echo e(__('Duration')); ?>:<sup class="redstar">*</sup>
						</label>

						<input placeholder="enter in mins eg 60" type="number" min="1" name="duration" class="form-control">
					</div>


					<div class="form-group col-md-3">
						<label>
							<?php echo e(__('Meeting Agenda')); ?>:<sup class="redstar">*</sup>
						</label>

						<input type="text" name="agenda" placeholder="Meeting Agenda" class="form-control">
					</div>

					<div class="form-group col-md-3">
						<label><?php echo e(__('Time Zone')); ?>:</label>
						<select class="form-control select2" name="timezone">
							  <option value="None"><?php echo e(__('Use Your Account Timezone')); ?></option>
							  <option value="Pacific/Midway"><?php echo e(__('Midway Island, Samoa')); ?></option>
							  <option value="Pacific/Pago_Pago"><?php echo e(__('Pago Pago')); ?></option>
							  <option value="Pacific/Honolulu"><?php echo e(__('Hawaii')); ?></option>
							  <option value="America/Anchorage"><?php echo e(__('Alaska')); ?></option>
							  <option value="America/Vancouver"><?php echo e(__('Vancouver')); ?></option>
							  <option value="America/Los_Angeles"><?php echo e(__('Pacific Time (US and Canada)')); ?></option>
							  <option value="America/Tijuana"><?php echo e(__('Tijuana')); ?></option>
							  <option value="America/Edmonton"><?php echo e(__('Edmonton')); ?></option>
							  <option value="America/Denver"><?php echo e(__('Mountain Time (US and Canada)')); ?></option>
							  <option value="America/Phoenix"><?php echo e(__('Arizona')); ?></option>
							  <option value="America/Mazatlan"><?php echo e(__('Mazatlan')); ?></option>
							  <option value="America/Winnipeg"><?php echo e(__('Winnipeg')); ?></option>
							  <option value="America/Regina"><?php echo e(__('Saskatchewan')); ?></option>
							  <option value="America/Chicago"><?php echo e(__('Central Time (US and Canada)')); ?></option>
							  <option value="America/Mexico_City"><?php echo e(__('Mexico City')); ?></option>
							  <option value="America/Guatemala"><?php echo e(__('Guatemala')); ?></option>
							  <option value="America/El_Salvador"><?php echo e(__('El Salvador')); ?></option>
							  <option value="America/Managua"><?php echo e(__('Managua')); ?></option>
							  <option value="America/Costa_Rica"><?php echo e(__('Costa Rica')); ?></option>
							  <option value="America/Montreal"><?php echo e(__('Montreal')); ?></option>
							  <option value="America/New_York"><?php echo e(__('Eastern Time (US and Canada)')); ?></option>
							  <option value="America/Indianapolis"><?php echo e(__('Indiana (East)')); ?></option>
							  <option value="America/Panama"><?php echo e(__('Panama')); ?></option>
							  <option value="America/Bogota"><?php echo e(__('Bogota')); ?></option>
							  <option value="America/Lima"><?php echo e(__('Lima')); ?></option>
							  <option value="America/Halifax"><?php echo e(__('Halifax')); ?></option>
							  <option value="America/Puerto_Rico"><?php echo e(__('Puerto Rico')); ?></option>
							  <option value="America/Caracas"><?php echo e(__('Caracas')); ?></option>
							  <option value="America/Santiago"><?php echo e(__('Santiago')); ?></option>
							  <option value="America/St_Johns"><?php echo e(__('Newfoundland and Labrador')); ?></option>
							  <option value="America/Montevideo"><?php echo e(__('Montevideo')); ?></option>
							  <option value="America/Araguaina"><?php echo e(__('Brasilia')); ?></option>
							  <option value="America/Argentina/Buenos_Aires"><?php echo e(__('Buenos Aires, Georgetown')); ?></option>
							  <option value="America/Godthab"><?php echo e(__('Greenland')); ?></option>
							  <option value="America/Sao_Paulo"><?php echo e(__('Sao Paulo')); ?></option>
							  <option value="Atlantic/Azores"><?php echo e(__('Azores')); ?></option>
							  <option value="Canada/Atlantic"><?php echo e(__('Atlantic Time (Canada)')); ?></option>
							  <option value="Atlantic/Cape_Verde"><?php echo e(__('Cape Verde Islands')); ?></option>
							  <option value="UTC"><?php echo e(__('Universal Time UTC')); ?></option>
							  <option value="Etc/Greenwich"><?php echo e(__('Greenwich Mean Time')); ?></option>
							  <option value="Europe/Belgrade"><?php echo e(__('Belgrade, Bratislava, Ljubljana')); ?></option>
							  <option value="CET"><?php echo e(__('Sarajevo, Skopje, Zagreb')); ?></option>
							  <option value="Atlantic/Reykjavik"><?php echo e(__('Reykjavik')); ?></option>
							  <option value="Europe/Dublin"><?php echo e(__('Dublin')); ?></option>
							  <option value="Europe/London"><?php echo e(__('London')); ?></option>
							  <option value="Europe/Lisbon"><?php echo e(__('Lisbon')); ?></option>
							  <option value="Africa/Casablanca"><?php echo e(__('Casablanca')); ?></option>
							  <option value="Africa/Nouakchott"><?php echo e(__('Nouakchott')); ?></option>
							  <option value="Europe/Oslo"><?php echo e(__('Oslo')); ?></option>
							  <option value="Europe/Copenhagen"><?php echo e(__('Copenhagen')); ?></option>
							  <option value="Europe/Brussels"><?php echo e(__('Brussels')); ?></option>
							  <option value="Europe/Berlin"><?php echo e(__('Amsterdam, Berlin, Rome, Stockholm, Vienna')); ?></option>
							  <option value="Europe/Helsinki"><?php echo e(__('Helsinki')); ?></option>
							  <option value="Europe/Amsterdam"><?php echo e(__('Amsterdam')); ?></option>
							  <option value="Europe/Rome"><?php echo e(__('Rome')); ?></option>
							  <option value="Europe/Stockholm"><?php echo e(__('Stockholm')); ?></option>
							  <option value="Europe/Vienna"><?php echo e(__('Vienna')); ?></option>
							  <option value="Europe/Luxembourg"><?php echo e(__('Luxembourg')); ?></option>
							  <option value="Europe/Paris"><?php echo e(__('Paris')); ?></option>
							  <option value="Europe/Zurich"><?php echo e(__('Zurich')); ?></option>
							  <option value="Europe/Madrid"><?php echo e(__('Madrid')); ?></option>
							  <option value="Africa/Bangui"><?php echo e(__('West Central Africa')); ?></option>
							  <option value="Africa/Algiers"><?php echo e(__('Algiers')); ?></option>
							  <option value="Africa/Tunis"><?php echo e(__('Tunis')); ?></option>
							  <option value="Africa/Harare"><?php echo e(__('Harare, Pretoria')); ?></option>
							  <option value="Africa/Nairobi"><?php echo e(__('Nairobi')); ?></option>
							  <option value="Europe/Warsaw"><?php echo e(__('Warsaw')); ?></option>
							  <option value="Europe/Prague"><?php echo e(__('Prague Bratislava')); ?></option>
							  <option value="Europe/Budapest"><?php echo e(__('Budapest')); ?></option>
							  <option value="Europe/Sofia"><?php echo e(__('Sofia')); ?></option>
							  <option value="Europe/Istanbul"><?php echo e(__('Istanbul')); ?></option>
							  <option value="Europe/Athens"><?php echo e(__('Athens')); ?></option>
							  <option value="Europe/Bucharest"><?php echo e(__('Bucharest')); ?></option>
							  <option value="Asia/Nicosia"><?php echo e(__('Nicosia')); ?></option>
							  <option value="Asia/Beirut"><?php echo e(__('Beirut')); ?></option>
							  <option value="Asia/Damascus"><?php echo e(__('Damascus')); ?></option>
							  <option value="Asia/Jerusalem"><?php echo e(__('Jerusalem')); ?></option>
							  <option value="Asia/Amman"><?php echo e(__('Amman')); ?></option>
							  <option value="Africa/Tripoli"><?php echo e(__('Tripoli')); ?></option>
							  <option value="Africa/Cairo"><?php echo e(__('Cairo')); ?></option>
							  <option value="Africa/Johannesburg"><?php echo e(__('Johannesburg')); ?></option>
							  <option value="Europe/Moscow"><?php echo e(__('Moscow')); ?></option>
							  <option value="Asia/Baghdad"><?php echo e(__('Baghdad')); ?></option>
							  <option value="Asia/Kuwait"><?php echo e(__('Kuwait')); ?></option>
							  <option value="Asia/Riyadh"><?php echo e(__('Riyadh')); ?></option>
							  <option value="Asia/Bahrain"><?php echo e(__('Bahrain')); ?></option>
							  <option value="Asia/Qatar"><?php echo e(__('Qatar')); ?></option>
							  <option value="Asia/Aden"><?php echo e(__('Aden')); ?></option>
							  <option value="Asia/Tehran"><?php echo e(__('Tehran')); ?></option>
							  <option value="Africa/Khartoum"><?php echo e(__('Khartoum')); ?></option>
							  <option value="Africa/Djibouti"><?php echo e(__('Djibouti')); ?></option>
							  <option value="Africa/Mogadishu"><?php echo e(__('Mogadishu')); ?></option>
							  <option value="Asia/Dubai"><?php echo e(__('Dubai')); ?></option>
							  <option value="Asia/Muscat"><?php echo e(__('Muscat')); ?></option>
							  <option value="Asia/Baku"><?php echo e(__('Baku, Tbilisi, Yerevan')); ?></option>
							  <option value="Asia/Kabul"><?php echo e(__('Kabul')); ?></option>
							  <option value="Asia/Yekaterinburg"><?php echo e(__('Yekaterinburg')); ?></option>
							  <option value="Asia/Tashkent"><?php echo e(__('Islamabad, Karachi, Tashkent')); ?></option>
							  <option value="Asia/Calcutta"><?php echo e(__('India')); ?></option>
							  <option value="Asia/Kathmandu"><?php echo e(__('Kathmandu')); ?></option>
							  <option value="Asia/Novosibirsk"><?php echo e(__('Novosibirsk')); ?></option>
							  <option value="Asia/Almaty"><?php echo e(__('Almaty')); ?></option>
							  <option value="Asia/Dacca"><?php echo e(__('Dacca')); ?></option>
							  <option value="Asia/Krasnoyarsk"><?php echo e(__('Krasnoyarsk')); ?></option>
							  <option value="Asia/Dhaka"><?php echo e(__('Astana, Dhaka')); ?></option>
							  <option value="Asia/Bangkok"><?php echo e(__('Bangkok')); ?></option>
							  <option value="Asia/Saigon"><?php echo e(__('Vietnam')); ?></option>
							  <option value="Asia/Jakarta"><?php echo e(__('Jakarta')); ?></option>
							  <option value="Asia/Irkutsk"><?php echo e(__('Irkutsk, Ulaanbaatar')); ?></option>
							  <option value="Asia/Shanghai"><?php echo e(__('Beijing, Shanghai')); ?></option>
							  <option value="Asia/Hong_Kong"><?php echo e(__('Hong Kong')); ?></option>
							  <option value="Asia/Taipei"><?php echo e(__('Taipei')); ?></option>
							  <option value="Asia/Kuala_Lumpur"><?php echo e(__('Kuala Lumpur')); ?></option>
							  <option value="Asia/Singapore"><?php echo e(__('Singapore')); ?></option>
							  <option value="Australia/Perth"><?php echo e(__('Perth')); ?></option>
							  <option value="Asia/Yakutsk"><?php echo e(__('Yakutsk')); ?></option>
							  <option value="Asia/Seoul"><?php echo e(__('Seoul')); ?></option>
							  <option value="Asia/Tokyo"><?php echo e(__('Osaka, Sapporo, Tokyo')); ?></option>
							  <option value="Australia/Darwin"><?php echo e(__('Darwin')); ?></option>
							  <option value="Australia/Adelaide"><?php echo e(__('Adelaide')); ?></option>
							  <option value="Asia/Vladivostok"><?php echo e(__('Vladivostok')); ?></option>
							  <option value="Pacific/Port_Moresby"><?php echo e(__('Guam, Port Moresby')); ?></option>
							  <option value="Australia/Brisbane"><?php echo e(__('Brisbane')); ?></option>
							  <option value="Australia/Sydney"><?php echo e(__('Canberra, Melbourne, Sydney')); ?></option>
							  <option value="Australia/Hobart"><?php echo e(__('Hobart')); ?></option>
							  <option value="Asia/Magadan"><?php echo e(__('Magadan')); ?></option>
							  <option value="SST"><?php echo e(__('Solomon Islands')); ?></option>
							  <option value="Pacific/Noumea"><?php echo e(__('New Caledonia')); ?></option>
							  <option value="Asia/Kamchatka"><?php echo e(__('Kamchatka')); ?></option>
							  <option value="Pacific/Fiji"><?php echo e(__('Fiji Islands, Marshall Islands')); ?></option>
							  <option value="Pacific/Auckland"><?php echo e(__('Auckland, Wellington')); ?></option>
							  <option value="Asia/Kolkata"><?php echo e(__('Mumbai, Kolkata, New Delhi')); ?></option>
							  <option value="Europe/Kiev"><?php echo e(__('Kiev')); ?></option>
							  <option value="America/Tegucigalpa"><?php echo e(__('Tegucigalpa')); ?></option>
							  <option value="Pacific/Apia"><?php echo e(__('Independent State of Samoa')); ?></option>
						</select>

							<small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Set to None if you want to use your account timezone')); ?>.</small>
					</div>
				

					<hr>
				</div>
					<div class="form-group col-md-6">
                        <button type="reset" class="btn btn-danger-rgba" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                        <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                            <?php echo e(__('Create')); ?></button>
                    </div>
                <div class="clear-both"></div>


				</form>
		</div>
	  </div>
	</div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
	<script>
		 $('#datetimepicker1').datetimepicker({
		    format: 'YYYY-MM-DD H:m:s',
		  });
		  $('#datetimepicker2').datetimepicker({
		    format: 'YYYY-MM-DD H:m:s',
		  });

	</script>

	<script>
	(function($) {
	  "use strict";

	  $(function(){

	      $('#link_by').change(function(){
	        if($('#link_by').is(':checked')){
	          $('#sec1_one').show('fast');
	        }else{
	          $('#sec1_one').hide('fast');
	        }

	      });


	      $('#recurring_meeting').change(function(){
	        if($('#recurring_meeting').is(':checked')){
	          $('#sec4_four').hide('fast');
			  $('#sec5_four').hide('fast');
	          $('#sec3_three').hide('fast');
	        }else{
	          $('#sec4_four').show('fast');
			  $('#sec5_four').show('fast');
	          $('#sec3_three').show('fast');
	        }

	        });
	   
	  });
	})(jQuery);
	</script>


	<script>
	  (function($) {
	    "use strict";
	    $(function(){
	        $('#myCheck').change(function(){
	          if($('#myCheck').is(':checked')){
	            $('#update-password').show('fast');
	          }else{
	            $('#update-password').hide('fast');
	          }
	        });
	        
	    });
	  })(jQuery);
	</script>


<?php $__env->stopSection(); ?>
			



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/jitsimeeting/create.blade.php ENDPATH**/ ?>