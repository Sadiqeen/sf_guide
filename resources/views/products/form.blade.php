<div class="form-row">
    <div class="form-group col-md-6">
        @php
        $name = '';
        if (old('name')) {
        $name = old('name');
        } elseif (isset($product)) {
        $name = $product->name;
        }
        @endphp
        <label for="name">
            ผลไม้
            <span class="text-danger">*</span>
        </label>
        <select class="form-control" name="name" id="name" onchange="updateTitle()">
            <option {{ $name == 'ทุเรียน' ? 'selected' : '' }}>ทุเรียน</option>
            <option {{ $name == 'มังคุด' ? 'selected' : '' }}>มังคุด</option>
            <option {{ $name == 'ลองกอง' ? 'selected' : '' }}>ลองกอง</option>
            <option {{ $name == 'เงาะ' ? 'selected' : '' }}>เงาะ</option>
            <option {{ $name == 'ลางสาด' ? 'selected' : '' }}>ลางสาด</option>
        </select>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        @php
        $province = '';
        if (old('province')) {
        $province = old('province');
        } elseif (isset($product)) {
        $province = $product->province;
        }
        @endphp
        <label for="province">
            จังหวัด
            <span class="text-danger">*</span>
        </label>
        <select class="form-control" name="province" id="province" onchange="updateTitle()">
            <option {{ $province == 'ยะลา' ? 'selected' : '' }}>ยะลา</option>
            <option {{ $province == 'ปัตตานี' ? 'selected' : '' }}>ปัตตานี</option>
            <option {{ $province == 'นราธิวาส' ? 'selected' : '' }}>นราธิวาส</option>
        </select>
        @error('province')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        @php
        $quantity = '';
        if (old('quantity')) {
        $quantity = old('quantity');
        } elseif (isset($product)) {
        $quantity = $product->quantity;
        }
        @endphp
        <label for="quantity">
            ปริมาณทั้งหมด
            <span class="text-danger">*</span>
        </label>
        <input type="number" step="0.01" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
            value="{{ $quantity ?? '' }}" id="quantity" onkeyup="updateTitle()" onkeydown="updateTitle()">
        @error('quantity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        @php
        $quantity_unit = '';
        if (old('quantity_unit')) {
        $quantity_unit = old('quantity_unit');
        } elseif (isset($product)) {
        $quantity_unit = $product->quantity_unit;
        }
        @endphp
        <label for="quantity_unit">
            หน่วย
            <span class="text-danger">*</span>
        </label>
        <select class="form-control" name="quantity_unit" id="quantity_unit" onchange="updateTitle()">
            <option {{ $quantity_unit == 'กก.' ? 'selected' : '' }}>กก.</option>
            <option {{ $quantity_unit == 'กล่อง' ? 'selected' : '' }}>กล่อง</option>
            <option {{ $quantity_unit == 'กำ' ? 'selected' : '' }}>กำ</option>
            <option {{ $quantity_unit == 'เข่ง' ? 'selected' : '' }}>เข่ง</option>
            <option {{ $quantity_unit == 'ช่อ' ? 'selected' : '' }}>ช่อ</option>
            <option {{ $quantity_unit == 'ชิ้น' ? 'selected' : '' }}>ชิ้น</option>
            <option {{ $quantity_unit == 'ดอก' ? 'selected' : '' }}>ดอก</option>
            <option {{ $quantity_unit == 'ตัน' ? 'selected' : '' }}>ตัน</option>
            <option {{ $quantity_unit == 'ถุง' ? 'selected' : '' }}>ถุง</option>
            <option {{ $quantity_unit == 'ผล' ? 'selected' : '' }}>ผล</option>
            <option {{ $quantity_unit == 'ฝัก' ? 'selected' : '' }}>ฝัก</option>
            <option {{ $quantity_unit == 'แพ็ค' ? 'selected' : '' }}>แพ็ค</option>
            <option {{ $quantity_unit == 'ฟอง' ? 'selected' : '' }}>ฟอง</option>
            <option {{ $quantity_unit == 'มัด' ? 'selected' : '' }}>มัด</option>
            <option {{ $quantity_unit == 'ร้อยดอก' ? 'selected' : '' }}>ร้อยดอก</option>
            <option {{ $quantity_unit == 'ร้อยฟอง' ? 'selected' : '' }}>ร้อยฟอง</option>
            <option {{ $quantity_unit == 'ร้อยละ' ? 'selected' : '' }}>ร้อยละ</option>
            <option {{ $quantity_unit == 'ร้อยลูก' ? 'selected' : '' }}>ร้อยลูก</option>
            <option {{ $quantity_unit == 'ลิตร' ? 'selected' : '' }}>ลิตร</option>
            <option {{ $quantity_unit == 'ลูก' ? 'selected' : '' }}>ลูก</option>
            <option {{ $quantity_unit == 'หวี' ? 'selected' : '' }}>หวี</option>
            <option {{ $quantity_unit == 'ห่อ' ? 'selected' : '' }}>ห่อ</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        @php
        $price = '';
        if (old('price')) {
        $price = old('price');
        } elseif (isset($product)) {
        $price = $product->price;
        }
        @endphp
        <label for="price">
            ราคา (บาท)
            <span class="text-danger">*</span>
        </label>
        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price"
            id="price" value="{{ $price ?? '' }}" onkeyup="updateTitle()" onkeydown="updateTitle()">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        @php
        $price_unit = '';
        if (old('price_unit')) {
        $price_unit = old('price_unit');
        } elseif (isset($product)) {
        $price_unit = $product->price_unit;
        }
        @endphp
        <label for="price_unit">
            หน่วย
            <span class="text-danger">*</span>
        </label>
        <select class="form-control" name="price_unit" id="price_unit" onchange="updateTitle()" readonly>
            <option {{ $price_unit == 'กก.' ? 'selected' : '' }}>กก.</option>
            {{-- <option {{ $price_unit == 'กล่อง' ? 'selected' : '' }}>กล่อง</option>
            <option {{ $price_unit == 'กำ' ? 'selected' : '' }}>กำ</option>
            <option {{ $price_unit == 'เข่ง' ? 'selected' : '' }}>เข่ง</option>
            <option {{ $price_unit == 'ช่อ' ? 'selected' : '' }}>ช่อ</option>
            <option {{ $price_unit == 'ชิ้น' ? 'selected' : '' }}>ชิ้น</option>
            <option {{ $price_unit == 'ดอก' ? 'selected' : '' }}>ดอก</option>
            <option {{ $price_unit == 'ตัน' ? 'selected' : '' }}>ตัน</option>
            <option {{ $price_unit == 'ถุง' ? 'selected' : '' }}>ถุง</option>
            <option {{ $price_unit == 'ผล' ? 'selected' : '' }}>ผล</option>
            <option {{ $price_unit == 'ฝัก' ? 'selected' : '' }}>ฝัก</option>
            <option {{ $price_unit == 'แพ็ค' ? 'selected' : '' }}>แพ็ค</option>
            <option {{ $price_unit == 'ฟอง' ? 'selected' : '' }}>ฟอง</option>
            <option {{ $price_unit == 'มัด' ? 'selected' : '' }}>มัด</option>
            <option {{ $price_unit == 'ร้อยดอก' ? 'selected' : '' }}>ร้อยดอก</option>
            <option {{ $price_unit == 'ร้อยฟอง' ? 'selected' : '' }}>ร้อยฟอง</option>
            <option {{ $price_unit == 'ร้อยละ' ? 'selected' : '' }}>ร้อยละ</option>
            <option {{ $price_unit == 'ร้อยลูก' ? 'selected' : '' }}>ร้อยลูก</option>
            <option {{ $price_unit == 'ลิตร' ? 'selected' : '' }}>ลิตร</option>
            <option {{ $price_unit == 'ลูก' ? 'selected' : '' }}>ลูก</option>
            <option {{ $price_unit == 'หวี' ? 'selected' : '' }}>หวี</option>
            <option {{ $price_unit == 'ห่อ' ? 'selected' : '' }}>ห่อ</option> --}}
        </select>
    </div>
    <div class="form-group col-md-12">
        @php
        $title = '';
        if (old('title')) {
        $title = old('title');
        } elseif (isset($product)) {
        $title = $product->title;
        }
        @endphp
        <label for="title">
            หัวข้อ
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
            value="{{ $title ?? '' }}" readonly>
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-12">
        @php
        $additional_information = '';
        if (old('additional_information')) {
        $additional_information = old('additional_information');
        } elseif (isset($product)) {
        $additional_information = $product->additional_information;
        }
        @endphp
        <label for="additional_information ">
            ข้อมูลเพิ่มเติม
            <span class="text-danger">*</span></label>
        <textarea class="form-control @error('additional_information') is-invalid @enderror" id="additional_information"
            name="additional_information" rows="3">{{ $additional_information ?? '' }}</textarea>
        @error('additional_information')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-12">
        <label for="inputPassword4">
            เพิ่มรูปภาพ
            <span class="text-danger">*</span>
        </label>
        <div class="custom-file">
            <input type="file" accept="image/x-png,image/jpeg" class="custom-file-input" multiple
                name="product_images[]" id="product_images">
            <label class="custom-file-label" for="product_images">เลือกรูป</label>
        </div>
        @error('product_images')
        <small class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
    <div class="form-group col-12 d-flex justify-content-center">
        <button class="btn btn-success">บันทึก</button>
    </div>
</div>

@push('script')
<script>
$(document).ready(function () {
    bsCustomFileInput.init()
})

const updateTitle = function() {
    const name = $('#name').val();
    const quantity = $('#quantity').val();
    const quantity_unit = $('#quantity_unit').val();
    const price = $('#price').val();
    const price_unit = $('#price_unit').val();
    const province = $('#province').val();

    let title = ""

    if (name) {
        title += "ขาย" + name
    }

    if (quantity) {
        title += " " + quantity + " " + quantity_unit
    }

    if (price) {
        title += " (" + price + " บาท/" + price_unit + ") "
    }

    if (province) {
        title += " จังหวัด " + province
    }

    console.log(title)
    $("#title").val(title);
}

</script>
@endpush
