<table>
    <thead>
    <tr>
        <th>Name Coupon</th>
        <th>Phone</th>
        <th>Ngày trúng</th>
    </tr>
    </thead>
    <tbody>
    @foreach($coupons as $coupon)
        <tr>
            <td>{{ $coupon->name }}</td>
            <td>{{ $coupon->customer->phone }}</td>
            <td>{{ $coupon->created_at }}
        </tr>
    @endforeach
    </tbody>
</table>
