@extends('layouts.master')

@section('content')
<h1><b>CALCULATE SPEED AND PACE</b></h1>

<div class="" id="vue-add-distance" >
  <form action="cal" method="GET  ">
    <div class="form-group">
        <label for="distance"><h3>Distance (Km): </h3></label>
        <input type="text" class="form-control" v-model="distance" id="distance" placeholder="Distance" name="distance">

        <label for="duration"><h3>Duration (Time) : </h3></label><br>
        <label for="hour">Hour : </label>
        <input type="text" class="form-control" v-model="hour" id="hour" name="hour" placeholder="hour">
        <label for="minute">Minute : </label>
        <input type="text" class="form-control" v-model="minute" id="minute" name="minute" placeholder="minute">
        <label for="second">Second : </label>
        <input type="text" class="form-control" v-model="second" id="second" name="second" placeholder="second">


    </div>
    <button class="btn btn-primary" v-on:click="submit()">Submit</button>
  </form>
</div>

<h1 class="title">Result of speed and pace</h1>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default" id="json-beautifier">
            <div class="panel-heading">
              GuzzleHttp
            </div>
            <div class="panel-body">
                <pre>@{{json}}</pre>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    var data = <?php echo $resBody; ?>;
    var vjson = new Vue({
        el: '#json-beautifier',
        data: data,
        computed: {
            json: function(){
                return JSON.stringify(this.data, null, 2);
            }
        }
    });

    var vm = new Vue({
        el: '#vue-app-distance',
        data: data
    });
</script>
@endsection
