<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>No Handphone</th>
            <th>Tanggal Pembelian</th>
            <th>Status</th>
            <th>Jumlah</th>
            <th>Size</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detail as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->User->name }}</td>
                <td>{{ $item->User->alamat }}</td>
                <td>{{ $item->User->nohp }}</td>
                <td>{{ date('d-M-Y', strtotime($item->Pesanan->tanggal)) }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->size }}</td>
                <td>Rp. {{ number_format($item->jumlah_harga, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>