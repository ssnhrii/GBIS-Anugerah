<main class="admin-main">
    <div class="admin-container">
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-error">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="admin-header">
            <div class="admin-welcome">
                <h1>Edit Dokumentasi</h1>
                <p>Perbarui informasi dokumentasi</p>
            </div>
            <div class="admin-user-info">
                <a href="<?= base_url('admin/dokumentasi') ?>" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
        </div>

        <div class="admin-section">
            <form action="<?= base_url('admin/dokumentasi/update/' . $dokumentasi['id']) ?>" method="post" enctype="multipart/form-data" class="form-jemaat">
                <?= csrf_field() ?>

                <div class="form-grid">
                    <!-- Informasi Dokumentasi -->
                    <div class="form-section">
                        <h3>Informasi Dokumentasi</h3>
                        
                        <div class="form-group">
                            <label for="judul">Judul <span class="required">*</span></label>
                            <input type="text" id="judul" name="judul" 
                                   value="<?= old('judul', $dokumentasi['judul']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"><?= old('deskripsi', $dokumentasi['deskripsi']) ?></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="kategori">Kategori <span class="required">*</span></label>
                                <select id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Foto" <?= old('kategori', $dokumentasi['kategori']) === 'Foto' ? 'selected' : '' ?>>Foto</option>
                                    <option value="Video" <?= old('kategori', $dokumentasi['kategori']) === 'Video' ? 'selected' : '' ?>>Video</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kegiatan">Jenis Kegiatan <span class="required">*</span></label>
                                <select id="jenis_kegiatan" name="jenis_kegiatan" required>
                                    <option value="">Pilih Jenis</option>
                                    <option value="Kaum Bapak" <?= old('jenis_kegiatan', $dokumentasi['jenis_kegiatan']) === 'Kaum Bapak' ? 'selected' : '' ?>>Kaum Bapak</option>
                                    <option value="Kaum Ibu" <?= old('jenis_kegiatan', $dokumentasi['jenis_kegiatan']) === 'Kaum Ibu' ? 'selected' : '' ?>>Kaum Ibu</option>
                                    <option value="Pemuda" <?= old('jenis_kegiatan', $dokumentasi['jenis_kegiatan']) === 'Pemuda' ? 'selected' : '' ?>>Pemuda</option>
                                    <option value="Anak-anak" <?= old('jenis_kegiatan', $dokumentasi['jenis_kegiatan']) === 'Anak-anak' ? 'selected' : '' ?>>Anak-anak</option>
                                    <option value="Umum" <?= old('jenis_kegiatan', $dokumentasi['jenis_kegiatan']) === 'Umum' ? 'selected' : '' ?>>Umum</option>
                                    <option value="Ibadah" <?= old('jenis_kegiatan', $dokumentasi['jenis_kegiatan']) === 'Ibadah' ? 'selected' : '' ?>>Ibadah</option>
                                    <option value="Lainnya" <?= old('jenis_kegiatan', $dokumentasi['jenis_kegiatan']) === 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- File & Detail -->
                    <div class="form-section">
                        <h3>File & Detail</h3>
                        
                        <!-- Current File Preview -->
                        <?php if (!empty($dokumentasi['file_path'])): ?>
                        <div class="form-group">
                            <label>File Saat Ini</label>
                            <div style="border: 1px solid var(--color-border); padding: 10px; border-radius: 8px; margin-bottom: 15px;">
                                <?php if ($dokumentasi['kategori'] === 'Foto'): ?>
                                    <img src="<?= base_url($dokumentasi['file_path']) ?>" 
                                         alt="<?= esc($dokumentasi['judul']) ?>"
                                         style="max-width: 200px; max-height: 200px; display: block;"
                                         onerror="this.src='<?= base_url('images/no-image.png') ?>'">
                                <?php else: ?>
                                    <video controls style="max-width: 300px; max-height: 200px; display: block;">
                                        <source src="<?= base_url($dokumentasi['file_path']) ?>">
                                    </video>
                                <?php endif; ?>
                                <p style="margin-top: 8px; font-size: 14px; color: var(--color-text-secondary);">
                                    <?= esc($dokumentasi['file_path']) ?>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="form-group">
                            <label>Ganti File (Opsional)</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="upload_method" value="keep" checked onchange="toggleUploadMethodEdit()">
                                    <span>Pertahankan File Lama</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="upload_method" value="file" onchange="toggleUploadMethodEdit()">
                                    <span>Upload File Baru</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="upload_method" value="url" onchange="toggleUploadMethodEdit()">
                                    <span>URL/Link Baru</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="file-upload-group" style="display: none;">
                            <label for="file_upload">Upload File Baru</label>
                            <input type="file" id="file_upload" name="file_upload" 
                                   accept="image/*,video/*"
                                   onchange="previewFile(this)">
                            <small>Format: JPG, PNG, GIF (max 5MB) atau MP4, AVI, MOV (max 50MB)</small>
                            <div id="file-preview" style="margin-top: 10px;"></div>
                        </div>

                        <div class="form-group" id="url-input-group" style="display: none;">
                            <label for="file_path">URL File Baru</label>
                            <input type="text" id="file_path" name="file_path" 
                                   value="<?= old('file_path') ?>" 
                                   placeholder="https://example.com/image.jpg atau https://youtube.com/watch?v=...">
                            <small>Untuk foto: URL gambar. Untuk video: URL YouTube/Vimeo</small>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                            <input type="date" id="tanggal_kegiatan" name="tanggal_kegiatan" 
                                   value="<?= old('tanggal_kegiatan', $dokumentasi['tanggal_kegiatan']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="fotografer">Fotografer/Videografer</label>
                            <input type="text" id="fotografer" name="fotografer" 
                                   value="<?= old('fotografer', $dokumentasi['fotografer']) ?>">
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                    <a href="<?= base_url('admin/dokumentasi') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
function toggleUploadMethodEdit() {
    const method = document.querySelector('input[name="upload_method"]:checked').value;
    const fileGroup = document.getElementById('file-upload-group');
    const urlGroup = document.getElementById('url-input-group');
    
    if (method === 'file') {
        fileGroup.style.display = 'block';
        urlGroup.style.display = 'none';
    } else if (method === 'url') {
        fileGroup.style.display = 'none';
        urlGroup.style.display = 'block';
    } else {
        fileGroup.style.display = 'none';
        urlGroup.style.display = 'none';
    }
}

function previewFile(input) {
    const preview = document.getElementById('file-preview');
    const file = input.files[0];
    
    if (file) {
        const reader = new FileReader();
        const fileSize = (file.size / 1024 / 1024).toFixed(2); // MB
        
        reader.onload = function(e) {
            if (file.type.startsWith('image/')) {
                preview.innerHTML = `
                    <div style="border: 1px solid var(--color-border); padding: 10px; border-radius: 8px;">
                        <img src="${e.target.result}" style="max-width: 200px; max-height: 200px; display: block;">
                        <p style="margin-top: 8px; font-size: 14px; color: var(--color-text-secondary);">
                            ${file.name} (${fileSize} MB)
                        </p>
                    </div>
                `;
            } else if (file.type.startsWith('video/')) {
                preview.innerHTML = `
                    <div style="border: 1px solid var(--color-border); padding: 10px; border-radius: 8px;">
                        <video controls style="max-width: 300px; max-height: 200px; display: block;">
                            <source src="${e.target.result}" type="${file.type}">
                        </video>
                        <p style="margin-top: 8px; font-size: 14px; color: var(--color-text-secondary);">
                            ${file.name} (${fileSize} MB)
                        </p>
                    </div>
                `;
            }
        };
        
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
    }
}
</script>
