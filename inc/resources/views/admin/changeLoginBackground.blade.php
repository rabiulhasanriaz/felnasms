@extends('admin.master')

@section('dashboard_menu_class','active')
@section('content')
<div class="right_col" role="main">
	<div class="">
	  <div class="page-title">
		@include('admin.partials.session_messages')
		<div class="title_left">
		  <h3>Reseller </h3>
		</div>
		<div class="title_right">
		  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Search for...">
			  <span class="input-group-btn">
				<button class="btn btn-secondary" type="button">Go!</button>
			  </span>
			</div>
		  </div>
		</div>
	  </div>
	
	  <div class="clearfix"></div>
	
	  <div class="row">
		<div class="col-md-12 col-sm-12 ">
		  <div class="x_panel">
			<div class="x_title">
			  <h2>Reseller  <small>List</small></h2>
			  <ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					  <a class="dropdown-item" href="#">Settings 1</a>
					  <a class="dropdown-item" href="#">Settings 2</a>
					</div>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			  </ul>
			  <div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
					  <div class="card-box table-responsive">
			  <table id="example" class="display nowrap" style="width:100%">
				<thead>
					<tr>
						<th>SL</th>
						<th>Company Name</th>
						<th>User Name</th>
						<th>Customer Type</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php($serial=1)
					@foreach($users as $user)
						<tr>
							<td>{{ $serial++ }}</td>
							<td>{{ $user->company_name }}</td>
							<td>{{ $user->userDetail['name'] }}</td>
							<td><p style='color:#428BCA;'>
									@if(($user->role==1) || ($user->role==2) || ($user->role==3))
										Root User {{ $user->role }}
									@elseif($user->role==4)
										Reseller
									@elseif($user->role==5)
										User
									@endif
								</p></td>
							<td>{{ $user->email }}</td>
							<td class=""><a href="tel:{{ $user->cellphone }}">{{ $user->cellphone }}</a></td>
							<td>
								<div class="widget-toolbar no-border">
									<button class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown"
											aria-expanded="false">
										Action
										<i class="ace-icon fa fa-chevron-down icon-on-right"></i>
									</button>
									<ul class="dropdown-menu dropdown-primary dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a href="{{ route('admin.reseller.priceView', $user->id ) }}">
												<i class="ace-icon fa fa-search-plus bigger-130"></i> Price View
											</a>
										</li>
										<li>
											<a href="{{ route('admin.reseller.transactionHistory', $user->id) }}"
											   class="tooltip-error" data-rel="tooltip" title="Account Details">
												<span class="label label-sm label-primary">Account</span>
											</a>
										</li>
										<li>
											@if($user->status=='1')
												<a href="{{ route('admin.reseller.suspend', $user->id) }}" class="tooltip-error" data-rel="tooltip" title="Conform">
													<span class="label label-sm label-warning">Suspend</span>
												</a>
											@else
												<a href="{{ route('admin.reseller.active', $user->id) }}" class="" data-rel="tooltip" title="Conform">
													<span class="label label-sm label-success">Re-Active</span>
												</a>
											@endif
										</li>
										<li class="divider"></li>
										<li>
											<a class="green" href="{{ route('admin.reseller.edit', $user->id) }}">
												<i class="ace-icon fa fa-pencil bigger-130"></i> Edit
											</a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="{{ route('admin.reseller.goToThisAccount', $user->id) }}"
											   class="tooltip-error" data-rel="tooltip" title="Account Details">
												<span class="label label-sm label-primary">Go to this account</span>
											</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			</div>
			</div>
		</div>
	  </div>
		  </div>
		</div>
		
	  </div>
	</div>
	</div>
@endsection