@extends('layout')


@section('style')
<style>
    body{
        width: 100%;
    }

    .cardsoall{
        background: white;
        filter: drop-shadow(0 0 0.4rem rgba(0,0,0,.1));
    }
</style>
@endsection

@section('content')
{{-- alert message --}}
<div class="d-flex justify-content-center align-items-center w-100" style="min-height: 100vh; margin-top: 5vh;">
    @if (session('message'))
    <div class="" style="display: flex; flex-wrap: wrap; justify-content: center; width:100%;">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 99%; max-width: 800px;">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <h1 class="text-center mb-3" style="font-size: 2em; font-weight: bold;">DAFTAR PERTANYAAN SOAL</h1>
    <div class="filter my-3" style="width: 99%; max-width: 800px; display: flex; flex-wrap: wrap; justify-content: end;">
        <select class="form-control select select-tipe" name="mapel" id="mapel" style="border: 1px solid rgba(0,0,0,.2);">
            <option value="0">All</option>
            @foreach ($mapels as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="bodywrap w-100 pb-5" style="display: flex; flex-wrap: wrap; justify-content: center;">
        @if (count($soals)==0)
            <div class="alert alert-warning" style="width: 99%; max-width: 800px;">
                Tidak ada soal
            </div>
        @endif
        @foreach ($soals as $key => $item)
            <div id="soalcard{{ ($key+1) }}" data-idsoal="{{ $item->id }}" class="mb-2 cardsoall" style="width: 99%; max-width: 800px; border-radius: 20px; border: 2px solid rgba(0,0,0,.1); padding: 15px 30px;">
                <h5 style="font-weight: bold">Pertanyaan {{ $key+1 }}</h5>
                <p><?= nl2br($item->pertanyaan); ?></p>
                
                <div class="mt-3" style="display: flex; flex-wrap: wrap; justify-content: end;">
                    <div class="">
                        @if ($item->jawaban!=null)
                            <button class="btn btn-success" style="color: white;"><i class="fa fa-check"></i>Done</button>
                        @else
                            <button class="btn btn-outline-warning">Mark as done</button>
                        @endif
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
</div>
<script>
    function nl2br (str, is_xhtml) {
        if (typeof str === 'undefined' || str === null) {
            return '';
        }
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }
    $(document).ready(function(){

        $(document).on('click', '[id^="soalcard"]', function(){
            $idsoal = $(this).data('idsoal');
            // $('#inputhiddenmodal').val($idsoal);
            window.location.href = '{{ route("soal.edit2", ":id") }}'.replace(':id', $idsoal);
        });
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
                    if(data.length==0){
                        $('.bodywrap').append(`
                        <div class="text-center" style="width: 99%; max-width: 800px;">
                            Tidak ada soal.
                        </div>
                        `);
                    }
                    data.forEach(myFunction);
                    function myFunction(item, index, arr) {
                        if(item['jawaban']!=null){
                            $('.bodywrap').append(`
                            <div id="soalcard`+(index+1)+`" data-idsoal="`+(item['id'])+`"  class="mb-2 cardsoall" style="width: 99%; max-width: 800px; border-radius: 20px; border: 2px solid rgba(0,0,0,.1); padding: 15px 30px;">
                                <h5 style="font-weight: bold">Pertanyaan `+(index+1)+`</h5>
                                <p>`+nl2br(item['pertanyaan'])+`</p>
                                <div class="" style="display: flex; flex-wrap: wrap; justify-content: end;">
                                    <button class="btn btn-success" style="color: white;"><i class="fa fa-check"></i>Done</button>
                                </div>
                            </div>
                            `);
                        }else{
                            $('.bodywrap').append(`
                            <div id="soalcard`+(index+1)+`" data-idsoal="`+(item['id'])+`"  class="mb-2 cardsoall" style="width: 99%; max-width: 800px; border-radius: 20px; border: 2px solid rgba(0,0,0,.1); padding: 15px 30px;">
                                <h5 style="font-weight: bold">Pertanyaan `+(index+1)+`</h5>
                                <p>`+nl2br(item['pertanyaan'])+`</p>
                                <div class="" style="display: flex; flex-wrap: wrap; justify-content: end;">
                                    <button class="btn btn-outline-warning">Mark as done</button>
                                </div>
                            </div>
                            `);
                        }
                    }
                }
            });
        });
    });
</script>
@endsection