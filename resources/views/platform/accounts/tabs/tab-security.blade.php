<div class="tab-pane {{ request()->query('tab') === 'security' ? 'active' : '' }}" id="tab-security" role="tabpanel" aria-labelledby="tab-security-area">
    <div class="row">
        <div class="col-md-12 mb-1">
            <h4><i data-feather="lock"></i> Alterar senha</h4>
        </div>
    </div>
    <form class="form form-horizontal form-tab-security" action="{{ route('account.settings.update') }}" enctype="multipart/form-data" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="security">
        <div class="row">
{{--            <div class="col-sm-12 col-md-12 form-group">--}}
{{--                <label for="old_password">Senha atual</label>--}}
{{--                <input type="text" id="old_password" class="form-control" name="old_password" placeholder="Senha atual" />--}}
{{--            </div>--}}
            <div class="col-sm-12 col-md-12 form-group">
                <label for="password">Nova senha</label>
                <input type="text" id="password" class="form-control" name="password" placeholder="Nova senha" />
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="password_confirmation">Confirmação de senha</label>
                <input type="text" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirmação de senha" />
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group text-left">
                <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
