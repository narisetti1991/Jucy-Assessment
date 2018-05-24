@include('header')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
    <div class="row">

        <section class="content">
            <div class="col-md-12">
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>

                                @if(isset($data) && count($data)>0)
                                    @foreach($data as $contact)

                                        <tr data-status="pagado">
                                            <td>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <span class="pull-right pagado">{{ $contact['count'] ." Contacts start with ". $contact['name'] }}</span>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
@include('footer')