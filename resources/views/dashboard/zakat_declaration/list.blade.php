@extends('dashboard.layouts.master')

@section('content')
   
    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>{{ __('backend.zakat_declaration') }}</h3>
                
            </div>

            
           

            @if($zakatDeclaration->total() > 0)
                
                <div class="table-responsive">
                    <table class="table table-bordered m-a-0">
                        <thead class="dker">
                        <tr>
                            <th  class="width20 dker">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>{{ __('backend.taxpayer') }}</th>
                            <th>{{ __('backend.idNumber') }}</th>
                            <th>{{ __('backend.taxNumber') }}</th>
                             <th>{{ __('backend.bank_name') }}</th>
                               <th>{{ __('backend.accountNumber') }}</th>
                             <th>{{ __('backend.contactMobile') }}</th>
                           <th>{{ __('backend.contactPhone') }}</th>
                            <th>{{ __('backend.contactFax') }}</th>
                             <th>{{ __('backend.contactEmail') }}</th>

                              <th>{{ __('backend.governorate') }}</th>
                               
                                  <th>{{ __('backend.taxpayerAddress') }}</th>

                                   <th>{{ __('backend.auditorName') }}</th>
                                <th>{{ __('backend.auditorAddress') }}</th>
                                
                                 
                                <th>{{ __('backend.auditorPhone') }}</th>
                                <th>{{ __('backend.auditorEmail') }}</th>
                                 <th>{{ __('backend.mainActivity') }}</th>
                                <th>{{ __('backend.descActivity') }}</th>
                            <th class="text-center" style="width:200px;">{{ __('backend.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($zakatDeclaration as $zakatDeclare)
                            <tr>
                                <td class="dker"><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $zakatDeclare->id }}"><i
                                            class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$zakatDeclare->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>
                                <td class="h6">
                                    {!! $zakatDeclare->taxpayer   !!}
                                </td>

                                <td>
                                    <small>{!! $zakatDeclare->idNumber   !!}</small>
                                </td>
                                <td>
                                    <small>{{ $zakatDeclare->taxNumber}}</small>
                                </td>
                                 <td>
                                    <small>{{ $zakatDeclare->bank_name}}</small>
                                </td>
                                 <td>
                                  
                                    <small>{{ $zakatDeclare->accountNumber}}</small>
                                </td>
                                 <td>
                                    <small>{{ $zakatDeclare->phone}}</small>
                                </td>
                                
                               <td>
                                  
                                    <small>{{ $zakatDeclare->tel}}</small>
                                </td>
                                 <td>
                                  
                                    <small>{{ $zakatDeclare->fax}}</small>
                                </td>
                                 <td>
                                  
                                    <small>{{ $zakatDeclare->email}}</small>
                                </td>
                                <td>
                                  
                                    <small>{{ $zakatDeclare->governorate}}</small>
                                </td>
                                <td>
                                  
                                    <small>{{ $zakatDeclare->address}}</small>
                                </td>
                                 <td>
                                  
                                    <small>{{ $zakatDeclare->auditorPhone}}</small>
                                </td>
                                 <td>
                                  
                                    <small>{{ $zakatDeclare->auditorEmail}}</small>
                                </td>
                                 <td>
                                  
                                    <small>{{ $zakatDeclare->auditorName}}</small>
                                </td>
                                <td>
                                  
                                    <small>{{ $zakatDeclare->auditorAddress}}</small>
                                </td>
                               
                                
                                
                                <td>
                                  
                                    <small>{{ $zakatDeclare->mainActivity}}</small>
                                </td>
                                <td>
                                  
                                    <small>{{ $zakatDeclare->descActivity}}</small>
                                </td>
                                <td class="text-center">
                                    
                                    @if(@Auth::user()->permissionsGroup->webmaster_status)
                                        <button class="btn btn-sm warning" data-toggle="modal"
                                                data-target="#m-{{ $zakatDeclare->id }}" ui-toggle-class="bounce"
                                                ui-target="#animate">
                                            <small><i class="material-icons">&#xe872;</i> {{ __('backend.delete') }}
                                            </small>
                                        </button>
                                    @endif


                                </td>
                            </tr>
                            <!-- .modal -->
                            <div id="m-{{ $zakatDeclare->id }}" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ __('backend.confirmationDeleteMsg') }}
                                              
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ __('backend.no') }}</button>
                                            <a href="{{ route("declarationDestroy",["id"=>$zakatDeclare->id]) }}"
                                               class="btn danger p-x-md">{{ __('backend.yes') }}</a>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <footer class="dker p-a">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <!-- .modal -->
                            <div id="m-all" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ __('backend.confirmationDeleteMsg') }}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ __('backend.no') }}</button>
                                            <button type="submit"
                                                    class="btn danger p-x-md">{{ __('backend.yes') }}</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->
                          
                        </div>

                        <div class="col-sm-3 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ __('backend.showing') }} {{ $zakatDeclaration->firstItem() }}
                                -{{ $zakatDeclaration->lastItem() }} {{ __('backend.of') }}
                                <strong>{{ $zakatDeclaration->total()  }}</strong> {{ __('backend.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $zakatDeclaration->links() !!}
                        </div>
                    </div>
                </footer>
                {{Form::close()}}
            @endif
        </div>
    </div>
@endsection
@push("after-scripts")
    <script type="text/javascript">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#action").change(function () {
            if (this.value == "delete") {
                $("#submit_all").css("display", "none");
                $("#submit_show_msg").css("display", "inline-block");
            } else {
                $("#submit_all").css("display", "inline-block");
                $("#submit_show_msg").css("display", "none");
            }
        });
    </script>
@endpush
