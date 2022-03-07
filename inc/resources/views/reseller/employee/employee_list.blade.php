@extends('reseller.master')

@section('employee_menu_class','open')
@section('employee_list_menu_class','current-page')

@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        @include('reseller.partials.session_messages')
        <div class="title_left">
          <h3>Employee </h3>
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
              <h2>Employee  <small>List</small></h2>
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
                        <table id="employee-list-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Employee name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Number of Users</th>
                                <th>Commission</th>
                                <th>Payable Balance</th>
                                <th>System</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($serial=1)
                            @foreach($data['allEmployee'] as $employee)
                                <tr>
                                    <td>{{ Auth::id() }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td class=""> {{ $employee->phone }}</td>
                                    <td class="text-center"><a href="{{ route('reseller.employee.employee_users_list', $employee->id) }}" class="badge badge-success"> {{ OtherHelpers::get_number_of_user($employee->id) }} </a></td>
                                    <td>{{ $employee->commission." %" }}</td>
            
                                    <td>{{ BalanceHelper::getEmployeeBalance($employee->id) }}</td>
                                    
                                    <td>
                                        <div class="widget-toolbar no-border">
            
                                            <button class="btn btn-xs bigger btn-primary dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                Active
                                                <i class="ace-icon fa fa-chevron-down icon-on-right"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-primary dropdown-menu-right dropdown-caret dropdown-close">
                                                
                                                
                                                <li class="divider"></li>
                                                <li>
                                                    <a class="green" href="{{ route('reseller.employee.edit', $employee->id) }}"
                                                       class="tooltip-error" data-rel="tooltip" title="Customer Edit">
                                                        <span class="label label-sm btn-success"
                                                              style="padding: 3px;">Edit This Employee</span>
                                                    </a>
                                                    
                                                    <a class="" href="{{ route('reseller.employee.employee_users_list', $employee->id) }}"
                                                       class="tooltip-error" data-rel="tooltip" title="Customer Edit">
                                                        <span class="label label-sm btn-warning "
                                                              style="padding: 3px;" >See Users of this Emplyee</span>
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

@section('custom_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
@endsection
@section('custom_script')
    {{-- <script src="{{ asset('assets') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#employee-list-table').DataTable();
    </script> --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function() {
    var table = $('#employee-list-table').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
    } );
    </script>
@endsection