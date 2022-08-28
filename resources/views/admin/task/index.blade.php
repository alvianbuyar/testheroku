@extends('admin.layout.master')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary d-flex justify-content-between align-items-center">
            <div>
              <h4 class="card-title">Tasks</h4>
              {{-- @foreach($data as $i=>$row)
                <p class="card-category">New task on {{$row->updated_at}}</p>
              @endforeach --}}
            </div>
            <a href="{{route('task.create')}}" class="btn btn-success btn-round">Add</a>
          </div>

          @foreach($data as $i=>$row)

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <div>
                              <td>{{$row->task_description}}</td>
                              <td class="td-actions float-right">
                                <form action="{{route('task.edit', $row->id)}}">
                                  <button type="submit" rel="tooltip" class="btn btn-white btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </form>
                                <form action="{{route('task.destroy', $row->id)}}" method="post" style="margin-left: 3mm; margin-right: 3mm">
                                  @csrf
                                  @method('DELETE')
                                    <button type="submit" rel="tooltip" class="btn btn-white btn-link btn-sm">
                                      <i class="material-icons">close</i>
                                    </button>
                                </form>
                              </td>
                            </div>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>

@endsection