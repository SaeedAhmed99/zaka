@extends('dashboard.layouts.master')

@section('content')
   
    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>{{ __('backend.projects') }}</h3>
                
            </div>

            
           

            @if($Projects->total() > 0)
                
                <div class="table-responsive">
                    <table class="table table-bordered m-a-0">
                        <thead class="dker">
                        <tr>
                            <th  class="width20 dker">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>{{ __('backend.project_name') }}</th>
                            <th>{{ __('backend.project_type') }}</th>
                            <th>{{ __('backend.company_name') }}</th>
                             <th>{{ __('backend.company_address') }}</th>
                             <th>{{ __('backend.project_details') }}</th>
                             <th>{{ __('backend.project_file') }}</th>

                            <th class="text-center" style="width:200px;">{{ __('backend.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Projects as $project)
                            <tr>
                                <td class="dker"><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $project->id }}"><i
                                            class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$project->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>
                                <td class="h6">
                                    {!! $project->project_name   !!}
                                </td>

                                <td>
                                    <small>{!! $project->project_type   !!}</small>
                                </td>
                                <td>
                                    <small>{{ $project->company_name}}</small>
                                </td>
                                 <td>
                                    <small>{{ $project->company_address}}</small>
                                </td>
                                 <td>
                                    <small>{{ $project->project_details}}</small>
                                </td>
                                
                                <td>
                                    <style type="text/css">
                                        a:link {
                                                  text-decoration: none;
                                                   color: blue;
                                                }

                                                a:visited {
                                                  text-decoration: none;
                                                }

                                                a:hover {
                                                  text-decoration: underline;
                                                }

                                                a:active {
                                                  text-decoration: underline;
                                                }
                                    </style>
                                    <small><a href="{{route('presenting_projects.download',$project->id)}}">{{ $project->project_file}}</a></small>
                                </td>
                                <td class="text-center">
                                    
                                    @if(@Auth::user()->permissionsGroup->webmaster_status)
                                        <button class="btn btn-sm warning" data-toggle="modal"
                                                data-target="#m-{{ $project->id }}" ui-toggle-class="bounce"
                                                ui-target="#animate">
                                            <small><i class="material-icons">&#xe872;</i> {{ __('backend.delete') }}
                                            </small>
                                        </button>
                                    @endif


                                </td>
                            </tr>
                            <!-- .modal -->
                            <div id="m-{{ $project->id }}" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ __('backend.confirmationDeleteMsg') }}
                                                <br>
                                                <strong>[ {{ $project->project_name }} ]</strong>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ __('backend.no') }}</button>
                                            <a href="{{ route("projectDestroy",["id"=>$project->id]) }}"
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
                            <small class="text-muted inline m-t-sm m-b-sm">{{ __('backend.showing') }} {{ $Projects->firstItem() }}
                                -{{ $Projects->lastItem() }} {{ __('backend.of') }}
                                <strong>{{ $Projects->total()  }}</strong> {{ __('backend.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Projects->links() !!}
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
