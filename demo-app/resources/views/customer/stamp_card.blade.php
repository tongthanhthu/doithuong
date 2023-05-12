@extends('customer.main')

@section('contents')
@include('customer.layout.alert')
    <table>
        <thead>
            <tr class='d-flex flex-wrap '>

                @php
                    $image = $customerStamp->app->stamp->imagestamp;
                    $sum = $customerStamp->app->stamp->stamp_number ;
                    $number = $customerStamp->stamp_number%$sum;
                @endphp

                @for ($i = 0; $i < $number; $i++)
                    <th class='mx-1'><img width="50xp" height="50xp" src="/upload/stamp/{{ $image[$i]->image_change }}"/></th>
                @endfor

                @for ($i = $number; $i < $sum; $i++)
                    <th class='mx-1'><img width="50xp" height="50xp" src="/upload/stamp/{{ $image[$i]->current_image }}"/></th>
                @endfor

            </tr>
        </thead>

    </table>


@if(isset($coupon))
    <body>

         <!-- Modal -->
         <div id="dnbtdevModal" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title ">chúc mừng bạn nhận được coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="card-body">
                        <dl>
                          <dt>Tên</dt>
                          <dd>{{ $coupon->name }}</dd>
                          <dt>Ảnh</dt>
                          <dd><p> <img width="100px" height="100px" src="{{ url('upload/coupon/'.$coupon->image )}}"></p></dd>
                        </dl>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <a href="{{ route('customer.show', $coupon->id) }}"><button class="btn btn-success float-right" type="button">chi tiết</button></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
           </div>

       </body>
@endif


<script >

    $(document).ready(function(){
        $('#dnbtdevModal').modal('show');
    });

</script>


@endsection


