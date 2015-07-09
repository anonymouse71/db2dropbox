@extends('db2dropbox::template')

@section('content')
    <div class="row">
    <div class="col-lg-12"><h1>Set Your Dropbox Backup Setting</h1></div>
	    <form action="" method="POST" role="form">
	    <fieldset class="scheduler-border">
	    	<legend class="scheduler-border">Basic Information</legend>
	    	<div class="col-lg-6">
	    		<div class="form-group">
	    			<label for="">Backup Folder Name</label>
	    			<input type="text" class="form-control" name="folder_name" placeholder="Backup Folder Name">
	    		</div>
	    	</div>

	    	<div class="col-lg-6">
	    		<div class="form-group">
	    			<label for="">Backup Folder Name</label>
	    			<input type="text" class="form-control" name="folder_name" placeholder="Backup Folder Name">
	    		</div>
	    	</div>
		</fieldset>

		<fieldset class="scheduler-border">
			<legend class="scheduler-border">Basic Schedule Setting</legend>

			<div class="col-lg-4">
				<div class="form-group">
					<label for="">Minute</label>
					<input type="text" class="form-control" required="" name="basic_min" value="0" list="minlist">
					<datalist id="minlist">
						<option value="*"></option>
						@for($i=0;$i<60;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</datalist>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label for="">Hour</label>
					<input class="form-control" required="" name="basic_hour" value="*" list="hourlist">
					<datalist id="hourlist">
						<option value="*">*</option>
						@for($i=0;$i<24;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</datalist>
				</div>
			</div>


			<div class="col-lg-4">
				<div class="form-group">
					<label for="">Day of month</label>
					<input class="form-control" required="" value="*" name="basic_day" list="daylist">
					<datalist id="daylist">
						<option value="*">*</option>
						@for($i=0;$i<31;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</datalist>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Month</label>
					<input type="text" value="*" class="form-control" required="" name="basic_month" list="monthlist">
					<datalist id="monthlist">
						<option value="*">*</option>
						@for($i=0;$i<12;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</datalist>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Day of week</label>
					<input type="text" value="*" class="form-control" required="" name="basic_week" list="weeklist">
					<datalist id="weeklist">
						<option value="*">*</option>
						<option value="0">Sunday</option>
						<option value="1">Monday</option>
						<option value="2">Tuesday</option>
						<option value="3">Wednesday</option>
						<option value="4">Thursday</option>
						<option value="5">Friday</option>
						<option value="6">Saturday</option>
					</datalist>
				</div>
			</div>

	    	</fieldset>


	    	<fieldset class="scheduler-border">
			<legend class="scheduler-border">Continuous Schedule Setting</legend>

			<div class="col-lg-4">
				<div class="form-group">
					<label for="">Minute</label>
					<input type="text" value="*/10" class="form-control" required="" name="continuous_min" list="minlist">
					<datalist id="minlist">
						<option value="*"></option>
						@for($i=0;$i<60;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</datalist>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label for="">Hour</label>
					<input class="form-control" required="" value="*" name="continuous_hour" list="hourlist">
					<datalist id="hourlist">
						<option value="*">*</option>
						@for($i=0;$i<24;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</datalist>
				</div>
			</div>


			<div class="col-lg-4">
				<div class="form-group">
					<label for="">Day of month</label>
					<input class="form-control" required="" value="*" name="continuous_day" list="daylist">
					<datalist id="daylist">
						<option value="*">*</option>
						@for($i=0;$i<31;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</datalist>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Month</label>
					<input type="text" value="*" class="form-control" required="" name="continuous_month" list="monthlist">
					<datalist id="monthlist">
						<option value="*">*</option>
						@for($i=0;$i<12;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</datalist>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Day of week</label>
					<input type="text" value="*" class="form-control" required="" name="continuous_week" list="weeklist">
					<datalist id="weeklist">
						<option value="*">*</option>
						<option value="0">Sunday</option>
						<option value="1">Monday</option>
						<option value="2">Tuesday</option>
						<option value="3">Wednesday</option>
						<option value="4">Thursday</option>
						<option value="5">Friday</option>
						<option value="6">Saturday</option>
					</datalist>
				</div>
			</div>

	    	</fieldset>

			<button type="button" class="btn btn-success">Save Settings</button>

	    </form>
	    <br>
	    <pre>
# +---------------- minute (0 - 59)
# |  +------------- hour (0 - 23)
# |  |  +---------- day of month (1 - 31)
# |  |  |  +------- month (1 - 12)
# |  |  |  |  +---- day of week (0 - 6) (Sunday=0 or 7)
# |  |  |  |  |
	    </pre>
    </div>
@stop