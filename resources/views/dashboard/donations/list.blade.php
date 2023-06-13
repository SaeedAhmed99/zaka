@extends('dashboard.layouts.master')

@section('content')
   
    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>{{ __('backend.donations') }}</h3>
                
            </div>

            
           

           
                
                <div class="table-responsive">
                    <table class="table table-bordered m-a-0">
                        <thead class="dker">
                        <tr>
                            <th  class="width20 dker">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>{{ __('backend.projectId') }}</th>
                            <th>{{ __('backend.projectName') }}</th>
                            
                             <th>{{ __('backend.payerEmail') }}</th>
                             <th>{{ __('backend.value') }}</th>
                             <th>{{ __('backend.status') }}</th>
                             

                            
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($donations as $donation)
                            <tr>
                                <td class="dker"><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $donation->id }}"><i
                                            class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$donation->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>
                                <td class="h6">
                                    {!! $donation->projectId   !!}
                                </td>

                                <td>
                                    <small>{!! $donation->projectName   !!}</small>
                                </td>
                              
                                 <td>
                                    <small>{{ $donation->payerEmail}}</small>
                                </td>
                                  <td>
                                    <small>{{ $donation->value}}</small>
                                </td>
                                <td>
                                    <small>{{ $donation->status}}</small>
                                </td>
                                
                                
                               
                               
                            </tr>
                            <!-- .modal -->
                            
                            <!-- / .modal -->
                        @endforeach

                        </tbody>
                    </table>

                </div>
                
                {{Form::close()}}
          
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
