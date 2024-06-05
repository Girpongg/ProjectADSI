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
            @foreach ($mapels as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="bodywrap w-100" style="display: flex; flex-wrap: wrap; justify-content: center;">
        @foreach ($soals as $key => $item)
            <div id="soalcard{{ ($key+1) }}" data-idsoal="{{ $item->id }}" class="mb-2" style="width: 99%; max-width: 800px; border-radius: 20px; border: 2px solid rgba(0,0,0,.1); padding: 15px 30px;">
                <h5>Pertanyaan {{ $key+1 }}</h5>
                <p><?= nl2br($item->pertanyaan); ?></p>
                
                <div class="mt-3" style="display: flex; flex-wrap: wrap; justify-content: end;">
                    <div class="">
                        @if ($item->jawaban!=null)
                            <button class="btn btn-success"><i class="fa fa-check"></i>Done</button>
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
        // $(window).load(function() {
        //     $('#exampleModal').modal('hide');
        // });
        $(document).on('click', '[id^="soalcard"]', function(){
            $idsoal = $(this).data('idsoal');
            $('#inputhiddenmodal').val($idsoal);
            // alert($idsoal);
            // open modal
            // $('#exampleModal').modal('show');
            // Create a form dynamically
            window.location.href = '{{ route("soal.edit2", ":id") }}'.replace(':id', $idsoal);
            // var form = $('<form>', {
            //     'method': 'GET',
            // });
            
            // // Add CSRF token to the form
            // form.append($('<input>', {
            //     'type': 'hidden',
            //     'name': '_token',
            //     'value': '{{ csrf_token() }}'
            // }));
            
            // // Append the form to the body and submit it
            // $('body').append(form);
            // form.submit();

            // $('#buttonopenmodal').click();
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
                            <p>`+nl2br(item['pertanyaan'])+`</p>
                            <div class="" style="display: flex; flex-wrap: wrap; justify-content: end;">
                                <button class="btn btn-outline-info">Mark as done</button>
                            </div>
                        </div>
                        `);
                    }
                }
            });
        });
    });
</script>
@endsection