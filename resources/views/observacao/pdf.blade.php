@extends('layouts.app')
@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style media="print">
@media print {
*{
  background: transparent;
  color: #000;
  text-shadow: none;
  filter: none;
  -ms-filter: none;
}
@page{
  margin: 2cm 2cm 2cm 3cm;
}
.foir-table{
  border: 1px solid black !important;
}
.invisible{
  visible: false !important;
}
.foir-table-down{
  border: 2px solid black !important;
  border-top: 0px !important;
}

.foir-titulo{
  margin-top: 35px;
  margin-bottom: 40px;
  font-weight: bold;
  font-size: 28px !important;
}
.foir-imagem{
  max-height: 250px;
  max-width: 200px;
}
.foir-label{
  font-size: 24px !important;
}
.pdf-imprimir{
  color: black
}
.foir-assinatura{
  max-width: 100%;
  max-height: 100px;
  position: relative;
  top: 50%;
  transform: translateY(-50%);
}
.foir-textarea{
  color: black !important;
}
}
</style>
<div class="">
  <div class="col-sm-12 text-center"><h1 class="foir-titulo">FICHA DE OBSERVACAO INDIVIDUAL RESERVADA (FOIR)</h1></div>
  <div class="row">
    <div class="col-3">
      <img class="foir-imagem" src={{url("/imagem-aluno/$aluno->foto")}} alt="" />
    </div>
    <div class="col-9">
    <div class="col-3">
      <label for="name" class="foir-label">Nº {{$aluno->numero_aluno}}</label>
    </div>
    <div class="col-12">
      <label for="name" class="foir-label">RE: {{$aluno->re}}</label>
    </div>
    <div class="col-12">
      <label for="name" class="foir-label">Graduação: Sd PM 2ª Cl</label>
    </div>
    <div class="col-12">
      <label for="name" class="foir-label">Nome de Guerra: <b>{{$aluno->nomeDeGuerra}}</b></label>
    </div>
      <div class="col-12">
      <label for="name" class="foir-label ">Nome: {{$aluno->nome}}</label>
    </div>
    </div>
  </div>
  <br>
  <br>
<div class="col-sm-12 text-center">
    <label for="" class="text-center">Observações</label>
</div>
<br>
@foreach($observ as $observs)
<div class="row observacoes">
  <div class="col-9">
    <label for=""> <b>{{$observs->graduacao}}  {{$observs->nome_graduado}}</b> em: {{date( 'd/m/Y' , strtotime($observs->created_at))}}</label>
    <p class="foir-textarea">{{$observs->descricao}}</p>
  </div>
  <div class="col-3 text-center">
    <img  class="foir-assinatura" src="{{url("/assinaturas/".$observs->assinatura)}}" alt="">
  </div>
</div>
@endforeach
</div>
<script type="text/javascript">
$(document).ready(function() {
  window.print();
});
</script>
@endsection
