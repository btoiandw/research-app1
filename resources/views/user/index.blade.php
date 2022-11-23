@section('title', 'User dashboard')
@extends('layouts.user')
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/function.js') }}"></script>
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
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <form id="formInsert" name="formInsert" method="POST" action="{{ route('insert-research') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="year_research" class="col-form-label">ปีงบประมาณ</label>
                                <input type="text" class="form-control" id="year_research" value="{{ date('Y') + 544 }}"
                                    name="year_research">
                                @if ($errors->has('year_research'))
                                    <span class="text-danger">{{ $errors->first('year_research') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="research_nameTH" class="col-form-label">ชื่อโครงร่างงานวิจัยภาษาไทย</label>
                                <textarea class="form-control" id="research_nameTH" name="research_nameTH"></textarea>
                                @if ($errors->has('research_nameTH'))
                                    <span class="text-danger">{{ $errors->first('research_nameTH') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="research_nameEN" class="col-form-label">ชื่อโครงร่างงานวิจัยภาษาอังกฤษ</label>
                                <textarea class="form-control" id="research_nameEN" name="research_nameEN"></textarea>
                                @if ($errors->has('research_nameEN'))
                                    <span class="text-danger">{{ $errors->first('research_nameEN') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">รายชื่อนักวิจัย</label>
                                <div class="card">
                                    <table class="table" id="tableTap" name="tableTap">
                                        <thead align="center">
                                            <tr>
                                                <th width="300px">ชื่อ-นามสกุล</th>
                                                <th>สังกัด/คณะ</th>
                                                <th width="200px">บทบาทในการวิจัย</th>
                                                <th width="100px">ร้อยละในการวิจัย</th>
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
                                                    <select class="form-select" id="faculty" name="faculty[]">
                                                        <option value="">--เลือกสังกัด/คณะ--</option>
                                                        @foreach ($list_fac as $row)
                                                            @if ($row->major == '0')
                                                                <option value="{{ $row->faculty_id }}">
                                                                    {{ $row->organizational }}</option>
                                                            @else
                                                                <option value="{{ $row->faculty_id }}">
                                                                    {{ $row->major }}&nbsp;&nbsp;{{ $row->organizational }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-select " name="role-research[]" id="role-research">
                                                        <option value="หัวหน้าโครงการวิจัย">หัวหน้าโครงการวิจัย</option>
                                                        <option value="ผู้ร่วมวิจัย">ผู้ร่วมวิจัย</option>
                                                    </select>

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="pc[]"
                                                        id="pc" placeholder="0.00" onchange="nPc()" />

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
                                <select class="form-select" id="source_id" name="source_id">
                                    <option value="">--เลือกแหล่งทุน--</option>
                                    @foreach ($list_source as $row)
                                        <option value="{{ $row->research_sources_id }}">{{ $row->research_source_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('source_id'))
                                    <span class="text-danger">{{ $errors->first('source_id') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>ประเภทงานวิจัย</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="type" id="type"
                                        value="ชุมชนท้องถิ่น">
                                    <label class="form-check-label" for="type">ชุมชนท้องถิ่น</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="type" type="checkbox" id="type"
                                        value="ศิลปวัฒนธรรม">
                                    <label class="form-check-label" for="type">ศิลปวัฒนธรรม</label>
                                </div>
                                @if ($errors->has('type'))
                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>คำสำคัญ</label>
                                <textarea name="keyword" id="keyword" placeholder="คำสำคัญในการวิจัย" class="form-control"></textarea>
                                @if ($errors->has('keyword'))
                                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>พื้นที่ในการวิจัย</label>
                                <textarea name="area_research" id="area_research" placeholder="" class="form-control"></textarea>
                                @if ($errors->has('area_research'))
                                    <span class="text-danger">{{ $errors->first('area_research') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="">วันที่เริ่มต้นการวิจัย</label>
                                <input class="form-control" id="sdate" name="sdate" placeholder="MM/DD/YYY"
                                    type="date" />
                                @if ($errors->has('sdate'))
                                    <span class="text-danger">{{ $errors->first('sdate') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="">วันที่สิ้นสุดการวิจัย</label>
                                <input class="form-control" id="edate" name="edate" placeholder="MM/DD/YYY"
                                    type="date" />
                                @if ($errors->has('edate'))
                                    <span class="text-danger">{{ $errors->first('edate') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>งบประมาณการวิจัย</label>
                                <input name="budage" id="budage" type="number" placeholder="0.00"
                                    class="form-control form-floating" />
                                @if ($errors->has('budage'))
                                    <span class="text-danger">{{ $errors->first('budage') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="file" name="word" id="word" class=" form-control">
                                <span class="text-danger">*ไฟล์ .doc และ .docx เท่านั้น</span>
                                @if ($errors->has('word'))
                                    <span class="text-danger">{{ $errors->first('word') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="file" name="pdf" id="pdf" class=" form-control">
                                <span class="text-danger">*ไฟล์ .pdf เท่านั้น</span>
                                @if ($errors->has('pdf'))
                                    <span class="text-danger">{{ $errors->first('pdf') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <input type="submit" value="ยืนยัน" name="submit" class="btn btn-primary">
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
        function nPc() {
            var max;
            if (document.formInsert.pc.value == "") {
                alert('โปรดกกรอกข้อมูลร้อยละในการวิจัย') ว
            } else {
                max = parseFloat(document.formInsert.pc.value);
            }

            var vMax = 100;
            var sum = 0;

            sum = sum + max;

            if (sum > vMax) {
                alert('ร้อยละความรับผิดชอบมีค่ามากกว่า 100 ');
            } else if (sum < vMax) {
                alert('ร้อยละความรับผิดชอบมีค่าน้อยกว่า 100 ');
            }
        }
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
