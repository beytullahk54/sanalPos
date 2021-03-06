@extends('layouts.app')

@section('css')
@endsection

@section('script')
@endsection

@section('baslik')
Eğitimler
@endsection

@section('icerik')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10 col-xs-12">
                    <h5>Satıştaki Eğitimler</h5>
                    <span class="d-block m-t-5">Yeni eğitim fiyatını buradan dahil edebilirsiniz</span>
                </div>
                <div class="col-md-2 col-xs-12 text-center">
                    <br>
                    <a href="{{URL::Asset('/panel/education/create-iyzico')}}" class=" btn-block btn btn-outline-primary has-ripple"><i class="feather mr-2 icon-thumbs-up"></i>Yeni iyzico Eğitimi<span class="ripple ripple-animate" style="height: 113.266px; width: 113.266px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -29.008px; left: 0.367px;"></span></a>
                </div>
            </div>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Eğitimin Adı</th>
                            <th>Eğitimin Ücreti</th>
                            <th>Eğitimin Url'si</th>
                            <th>Ayarlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($educations as $education)
                        
                            <tr>
                                <td>{{$education->id}}</td>
                                <td>{{$education->education_name}}</td>
                                <td>{{$education->education_price}}</td>
                                <td>{{URL::asset('iyzico/'.$education->education_url)}}</td>
                                <td>

                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Ayarlar
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{URL::Asset('panel/education/edit/'.$education->id)}}">Güncelle</a>
                                          <a class="dropdown-item" href="{{URL::Asset('panel/education/delete/'.$education->id)}}">Sil</a>
                                        </div>
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
@endsection