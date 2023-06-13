@extends('dashboard.layouts.master')
@section('title', __('backend.siteMenus'))

@section('content')
 <div>
  <ol class="sortable">
    <li><div>Some content</div></li>
    <li>
        <div>Some content</div>
        <ol>
            <li><div>Some sub-item content</div></li>
            <li><div>Some sub-item content</div></li>
        </ol>
    </li>
    <li><div>Some content</div></li>
</ol>
</div>
@endsection
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script src="{{ asset('assets/dashboard/lib/nestable/jquery.nestable.js') }}"></script>
<script type="text/javascript">
    
    $(document).ready(function(){

        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div'
        });

    });
</script>