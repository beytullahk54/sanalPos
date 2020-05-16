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
        <form action="{{URL::Asset('/panel/education/createPost')}}" method="post" >
            {{ csrf_field() }}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 col-xs-12">
                        <h5>Eğitim Bilgileri</h5>
                        <span class="d-block m-t-5">Yeni eğitim fiyatını buradan dahil edebilirsiniz</span>
                    </div>
                    <div class="col-md-2 col-xs-12 text-center">
                        <br>
                        <button class=" btn-block btn btn-outline-primary has-ripple"><i class="feather mr-2 icon-thumbs-up"></i>Eğitimi Kaydet<span class="ripple ripple-animate" style="height: 113.266px; width: 113.266px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -29.008px; left: 0.367px;"></span></button>
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="col-md-12 mb-3">
                    <label for="validationTooltip01">Eğitim Adı</label>
                    <input type="text" class="form-control" name="education_name" id="validationTooltip01" placeholder="Eğitimin Adı" value="" required="">
                
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationTooltip01">Eğitim Fiyatı</label>
                    <input type="text" class="form-control" name="education_price" id="validationTooltip01" placeholder="Eğitimin Fiyatı" value="" required="">
                
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  id="basic-addon3">{{URL::Asset('odeme/')}}</span>
                    </div>
                    <input type="text" class="form-control" name="education_url" id="basic-url" aria-describedby="basic-addon3">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
