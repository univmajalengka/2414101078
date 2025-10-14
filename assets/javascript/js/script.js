// Modal beli
const beliModal = document.getElementById('beliModal');
if (beliModal) {
  beliModal.addEventListener('show.bs.modal', e => {
    const b = e.relatedTarget;
    document.getElementById('idKucing').value = b.getAttribute('data-id');
    document.getElementById('namaKucing').value = b.getAttribute('data-nama');
    document.getElementById('hargaKucing').value =
      'Rp ' + parseInt(b.getAttribute('data-harga')).toLocaleString("id-ID");
  });
}

// Modal edit
const editModal = document.getElementById('editModal');
if (editModal) {
  editModal.addEventListener('show.bs.modal', e => {
    const b = e.relatedTarget;
    document.getElementById('editId').value = b.getAttribute('data-id');
    document.getElementById('editNama').value = b.getAttribute('data-nama');
    document.getElementById('editUsia').value = b.getAttribute('data-usia');
    document.getElementById('editHarga').value = b.getAttribute('data-harga');
    document.getElementById('editGambarLama').value = b.getAttribute('data-gambar');
  });
}
