<a href="{{ route('karyawan.show', $karyawan->id) }}" class="btn btn-sm btn-primary">Detail</a>
<a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-sm btn-warning">Ubah</a>
 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-{{ $karyawan->id }}">
    Hapus
</button>