
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
                                            <a href="#" class="pull-left" data-toggle="modal" data-target="#exampleModalCenter_{{$contact->id}}">
                                                <img src="{{ asset('images/images.png') }}" class="media-photo">
                                            </a>
                                            <div class="media-body">
                                                <span class="pull-right pagado">{{ $contact->name }}</span>
                                                <br><small>{{$contact->company->name }}</small>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                              @endforeach
                             @else
                                <p>Sorry, No data found</p>
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

@if(isset($data) && count($data)>0)
    @foreach($data as $contact)
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter_{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Business Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="well well-sm">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <img src="{{ asset('images/cardimages.png') }}" alt="" class="img-rounded img-responsive" />
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <h4>{{$contact->name}}</h4>
                                        <small>{{$contact->company->name}}</small>
                                        <br>
                                        <br>
                                        <small><cite title="San Francisco, USA">{{$contact->address->suite.', '.$contact->address->street.', '.$contact->address->city.','.$contact->address->zipcode}}<i class="glyphicon glyphicon-map-marker">
                                                </i></cite></small>
                                        <p>
                                            <i class="glyphicon glyphicon-envelope"></i> {{$contact->email}}
                                            <br />
                                            <i class="glyphicon glyphicon-globe"></i> {{$contact->website}}
                                            <br />
                                            <i class="glyphicon glyphicon-phone"></i> {{$contact->phone}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach
@endif
@include('footer')