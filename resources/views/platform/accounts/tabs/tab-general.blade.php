<div class="tab-pane {{ empty(request()->query('tab')) || request()->query('tab') === 'general' ? 'active' : '' }}" id="tab-general" role="tabpanel" aria-labelledby="tab-general-area">
    <div class="row">
        <div class="col-md-12 mb-1">
            <h4><i data-feather="settings"></i> Informações gerais</h4>
        </div>
    </div>
    <form class="form form-horizontal form-tab-general" action="{{ route('account.settings.update') }}" enctype="multipart/form-data" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="general">
        <div class="row">
            <div class="col-sm-12 col-md-12 form-group">
                <div class="media">
                    <a href="#" class="mr-1 media-left">
                        <img src="{{ asset($account->avatar) }}" alt="Avatar" id="avatar-preview" height="64" width="64" class="rounded-circle media-object">
                    </a>
                    <div class="mt-25 media-body">
                        <div class="d-flex flex-sm-row flex-column justify-content-start px-0">
                            <div class="react-ripples" style="position: relative; display: inline-flex; overflow: hidden;">
                                <input id="file-input" type="file" name="avatar" style="display: none;">
                                <button type="button" onclick="document.getElementById('file-input').click()" class="btn btn-outline-primary mr-1">Upload Foto</button>

{{--                                <label class="mr-50 cursor-pointer btn btn-outline-primary">--}}
{{--                                    Upload Photo<input accept="image/*" name="file" id="uploadImg" hidden="" type="file" class="form-control-file">--}}
{{--                                </label>--}}
                            </div>
                            <div class="react-ripples" style="position: relative; display: inline-flex; overflow: hidden;">
                                <button type="button" class="btn btn-outline-danger">Remove</button>
                            </div>
                        </div>
                        <p class="text-muted mt-50"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="name">Nome completo</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $account->name }}" placeholder="Nome completo">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Email" readonly />
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
{{--            <div class="col-sm-12 col-md-12 form-group">--}}
{{--                <label for="company">Empresa</label>--}}
{{--                <input type="text" id="company" class="form-control" name="company" placeholder="Empresa" />--}}
{{--            </div>--}}
            <div class="col-sm-12 col-md-12 form-group text-left">
                <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
