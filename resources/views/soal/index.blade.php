@extends('layout')


@section('style')
<style>
    body{
        width: 100%;
    }
</style>
@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center w-100" style="min-height: 100vh; margin-top: 5vh;">
    <h1 class="text-center mb-3" style="font-size: 2em; font-weight: bold;">DAFTAR PERTANYAAN SOAL</h1>
    <div class="filter my-3" style="width: 99%; max-width: 800px; display: flex; flex-wrap: wrap; justify-content: end;">
        <select class="form-control select select-tipe" name="mapel" id="mapel" style="border: 1px solid rgba(0,0,0,.2);">
            <option value="">All</option>
            <option value="1">Fisika</option>
            <option value="2">Kimia</option>
            <option value="3">Matematika</option> 
        </select>
    </div>
    <div class="bodywrap w-100" style="display: flex; flex-wrap: wrap; justify-content: center;">
        @foreach ($soals as $key => $item)
            <div class="mb-2" style="width: 99%; max-width: 800px; border-radius: 20px; border: 2px solid rgba(0,0,0,.1); padding: 15px 30px;">
                <h5>Pertanyaan {{ $key+1 }}</h5>
                <p>{{ $item->pertanyaan }}</p>
                <div class="" style="display: flex; flex-wrap: wrap; justify-content: end;">
                    <button class="btn btn-outline-info">Mark as done</button>
                </div>
            </div>
            
        @endforeach
    </div>
</div>
<script>
    $(document).on('change', '#mapel', function(){
        var mapel = $('#mapel').val();
        // alert(mapel);

        $.ajax({
            url: '{{ route("soal.index") }}',
            type: 'GET',
            data: {
                mapel: mapel
            },
            success: function(data){
                console.log(data);
                $('.bodywrap').html(
                    `
                    ` 
                );
                data.forEach(myFunction);
                function myFunction(item, index, arr) {
                    // arr[index] = item * 10;
                    // console.log("DUARrrr");
                    // console.log(item);
                    // console.log(index);
                    // console.log(arr);
                    $('.bodywrap').append(`
                    <div class="mb-2" style="width: 99%; max-width: 800px; border-radius: 20px; border: 2px solid rgba(0,0,0,.1); padding: 15px 30px;">
                        <h5>Pertanyaan `+(index+1)+`</h5>
                        <p>`+item['pertanyaan']+`</p>
                        <div class="" style="display: flex; flex-wrap: wrap; justify-content: end;">
                            <button class="btn btn-outline-info">Mark as done</button>
                        </div>
                    </div>
                    `);
                }
            }
        });
    });
</script>
@endsection