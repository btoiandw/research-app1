@section('title', 'User dashboard')
@extends('layouts.user')
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')

    <div class="container">
        <div class="row justify-content-around mb-4 align-items-center">
            <div class="col-4 header">
                หน้าหลัก
            </div>
            <div class="col-4 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@getbootstrap">เพิ่มโครงร่างงานวิจัย</button>
            </div>
        </div>
        <div class="row col-md-12 mb-3">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="col-rt-3 equal-height">
                    <div class="sb-example-3">
                        <!-- partial:index.partial.html -->
                        <div class="search__container">

                            <input class="search__input" type="text" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-center">
            <div class="card">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อโครงร่างงานวิจัย</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">จัดการ</th>

                        </tr>
                    </thead>
                    <tbody>
                       {{--  <tr>
                            <th scope="row">1</th>
                            <td></td>
                            <td>
                                <button class="btn btn-secondary">รายละเอียด</button>
                            </td>
                            <td></td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <button class="btn btn-warning me-md-2" type="button">แก้ไข</button>
                                    <button class="btn btn-danger" type="button">ยกเลิก</button>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>

        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ส่งโครงร่างงานวิจัย</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">ปีงบประมาณ</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">ชื่อโครงร่างงานวิจัยภาษาไทย</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">ชื่อโครงร่างงานวิจัยภาษาอังกฤษ</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">รายชื่อนักวิจัย</label>
                                <div class="card">
                                    <table class="table" id="tableTap" name="tableTap">
                                        <thead align="center">
                                            <tr>
                                                <th>ชื่อ-นามสกุล</th>
                                                <th>สังกัด/คณะ</th>
                                                <th>บทบาทในการวิจัย</th>
                                                <th>ร้อยละในการวิจัย</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody align="center" id="roleResearch">
                                            <tr>
                                                <td>
                                                    <input type="text" name="researcher[]" id="researcher"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="faculty[]"
                                                        id="faculty">
                                                </td>
                                                <td>
                                                    <select class="form-select " name="role-research[]" id="role-research">
                                                        <option value="หัวหน้าโครงการวิจัย">หัวหน้าโครงการวิจัย</option>
                                                        <option value="ผู้ร่วมวิจัย">ผู้ร่วมวิจัย</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="pc[]" id="pc"
                                                        placeholder="0.00" />
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info" id="addBtn">+</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message-text">แหล่งทุนวิจัย</label>
                                <select class="form-select" id="source" name="source">
                                    <option value="">--เลือกแหล่งทุน--</option>
                                    @foreach ($list_source as $row)
                                        <option value="{{ $row->id }}">{{ $row->research_source_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>ประเภทงานวิจัย</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>คำสำคัญ</label>
                                <textarea placeholder="คำสำคัญในการวิจัย" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>พื้นที่ในการวิจัย</label>
                                <textarea placeholder="" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">วันที่เริ่มต้นการวิจัย</label>
                                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY"
                                    type="date" />
                            </div>
                            <div class="mb-3">
                                <label for="">วันที่สิ้นสุดการวิจัย</label>
                                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY"
                                    type="date" />
                            </div>
                            <div class="mb-3">
                                <label>งบประมาณการวิจัย</label>
                                <input type="number" class="form-control form-floating" />
                            </div>
                            <div class="mb-3">
                                <input type="file" name="word" id="word" class=" form-control">
                                <span class="text-danger">*ไฟล์ .doc และ .docx เท่านั้น</span>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="pdf" id="pdf" class=" form-control">
                                <span class="text-danger">*ไฟล์ .pdf เท่านั้น</span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <input type="submit" value="ยืนยัน" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var i = 1;
            $('#addBtn').click(function() {
                i++;
                $('#roleResearch').append('<tr id="row' + i +
                    '"><td><input type="text" name="researcher[]" id="researcher" class="form-control"></td><td><input type="text" class="form-control" name="faculty[]" id="faculty"></td><td><select class="form-select " name="role-research[]" id="role-research"><option value="หัวหน้าโครงการวิจัย">หัวหน้าโครงการวิจัย</option><option value="ผู้ร่วมวิจัย" selected>ผู้ร่วมวิจัย</option></select></td><td><input type="number" class="form-control" name="pc[]" id="pc"placeholder="0.00" /></td><td><button type="button" id="btnDel" class="btn btn-danger" >-</button></td></tr>'
                );
            });
        });
        $(document).on('click', '#btnDel', function() {
            $(this).closest('tr').remove();
        });

        $(document).ready(function() {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        });
    </script>

@endsection
