@extends('layouts.admin')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    p { color: #000000; }
    #editAvatar { display: none; }
    .avatar-container { position: relative; display: inline-block; }
    .avatar-container .edit-avatar { display: block; }
    .edit-avatar {
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 50%;
        padding: 5px;
        display: none;
    }
    .edit-avatar i { color: #fff; }
    .edit-mode input, .edit-mode select {
        border: 1px solid #ddd;
        padding: 5px;
        width: 100%;
        border-radius: 4px;
    }
    .info-field input, .info-field select {
        border: none;
        background: transparent;
        padding: 5px;
        width: 100%;
        border-radius: 4px;
        box-shadow: none;
    }
    .info-field input:disabled { cursor: not-allowed; }
</style>

<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Hồ sơ admin</h4>
            </div>
            <button id="editBtn" class="btn btn-primary ms-auto">Sửa</button>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="userForm" action="{{ route('admin.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="d-flex align-items-center mb-4">
                                <div class="avatar-container">
                                    <img id="avatarPreview" src="{{ $admin->anh_dai_dien ? asset('storage/' . $admin->anh_dai_dien) : asset('assets/admin/images/users/user-11.jpg') }}" class="rounded-circle avatar-lg img-thumbnail float-start" alt="Ảnh đại diện">
                                    <input type="file" id="avatarInput" name="anh_dai_dien" accept="image/*" style="display: none;">
                                    <span class="edit-avatar" id="editAvatar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </span>
                                </div>
                                <div class="ms-3">
                                    <h4 class="m-0 text-dark">{{ $admin->ten }}</h4>
                                    <p class="text-muted mb-0">{{ ucfirst($admin->getRoleNames()->first()) }}</p>
                                </div>
                            </div>

                            <div class="tab-content text-muted bg-white mt-3">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h5 class="fs-16 text-dark fw-semibold">Giới thiệu</h5>
                                        <p>Họ và tên: <span class="info-field"><input type="text" name="ten" value="{{ $admin->ten }}" disabled></span></p>
                                        <p>Ngày sinh: <span class="info-field"><input type="date" name="ngay_sinh" value="{{ $admin->ngay_sinh }}" disabled></span></p>
                                        <p>Chức vụ: <span class="info-field"><input type="text" value="{{ ucfirst($admin->getRoleNames()->first()) }}" disabled></span></p>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <h5 class="fs-16 text-dark fw-semibold">Liên hệ</h5>
                                        <p>Email: <span class="info-field"><input type="email" name="email" value="{{ $admin->email }}" disabled></span></p>
                                        <p>Địa chỉ: <span class="info-field"><input type="text" name="dia_chi" value="{{ $admin->dia_chi }}" disabled></span></p>
                                        <p>Số điện thoại: <span class="info-field"><input type="text" name="so_dien_thoai" value="{{ $admin->so_dien_thoai }}" disabled></span></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('editBtn').addEventListener('click', function () {
        let fields = document.querySelectorAll('.info-field input');
        let form = document.getElementById('userForm');
        
        if (this.innerText === "Sửa") {
            fields.forEach(function (field) {
                field.removeAttribute('disabled');
                field.classList.add('edit-mode');
                field.style.backgroundColor = '#fff';
                field.style.border = '1px solid #ddd';
            });
            this.innerText = "Lưu";
            document.getElementById('editAvatar').style.display = 'block';
        } else {
            document.getElementById('editAvatar').style.display = 'none';

            let formData = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    fields.forEach(function (field) {
                        field.setAttribute('disabled', true);
                        field.classList.remove('edit-mode');
                        field.style.border = 'none';
                        field.style.backgroundColor = 'transparent';
                    });
                    document.getElementById('editBtn').innerText = "Sửa";
                } else {
                    alert('Có lỗi xảy ra: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
            });
        }
    });

    document.getElementById('editAvatar').addEventListener('click', function () {
        document.getElementById('avatarInput').click();
    });

    document.getElementById('avatarInput').addEventListener('change', function (e) {
        let reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('avatarPreview').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection