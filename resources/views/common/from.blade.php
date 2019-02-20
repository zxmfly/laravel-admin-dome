<form class="form-horizontal" method="post" action=""><!--{{url('student/save')}}这个是提交到保存方法 -->
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>

        <div class="col-sm-5">
            <input type="text" value="{{old('Student')['name'] ? old('Student')['name'] : $student->name}}" class="form-control" name="Student[name]" id="name" placeholder="请输入学生姓名">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.name')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年龄</label>

        <div class="col-sm-5">
            <input type="text" value="{{old('Student')['age'] ? old('Student')['age'] : $student->age}}" class="form-control" name="Student[age]" id="age" placeholder="请输入学生年龄">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.age')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">性别</label>

        <div class="col-sm-5">
            @foreach($student->getSex() as $key => $value)
                <label class="radio-inline">
                    <input type="radio" name="Student[sex]" value="{{$key}}"
                    @if (old('Student')['sex'])
                        {{ old('Student')['sex'] == $key ? "checked" : ''}}
                    @elseif(isset($student))
                        {{ $student->sex == $key ? "checked" : ''}}
                    @endif
                    /> {{$value}}
                </label>
            @endforeach
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Student.sex')}}</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>