<?php "../config/connect.php"?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Thêm Sản Phẩm</h5>
                <hr />
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Tên Sản Phẩm</label>
                                    <input type="email" class="form-control" id="inputProductTitle" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Mô Tả</label>
                                    <textarea class="form-control" id="inputProductDescription" rows="3" placeholder="Nhập Mô Tả Sản Phẩm"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Ảnh Sản Phẩm</label>
                                    <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf,.png,.jpg" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Giá</label>
                                        <input type="text" class="form-control" id="inputPrice" placeholder="00.00 $">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputQty" class="form-label">Số lượng</label>
                                        <input type="number" min=1 max=100 class="form-control" id="inputQty" placeholder="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Giảm Giá</label>
                                        <input type="number" min=1 max=100 class="form-control" id="inputCostPerPrice" placeholder="0%">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Đánh Giá</label>
                                        <input type="number" min=1 max=10  class="form-control" id="inputStarPoints" placeholder="Từ 1 tới 10">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductType" class="form-label">Kiểu Thức Ăn</label>
                                        <select class="form-select" id="inputProductType">
                                            <option></option>
                                            <option value="1">Bánh</option>
                                            <option value="2">Kẹo</option>
                                            <option value="3">Khô</option>
                                            <option value="4">Mứt</option>
                                            <option value="5">Trái Cây</option>
                                            <option value="6">Đồ Chiên</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary">Lưu Sản Phẩm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->
<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
</script>

