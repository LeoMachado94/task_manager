<div class="tab-pane {{ request()->query('tab') === 'info' ? 'active' : '' }}" id="tab-info" role="tabpanel" aria-labelledby="tab-info-area">
    <div class="row">
        <div class="col-md-12 mb-1">
            <h4><i data-feather="info"></i> Informações pessoais</h4>
        </div>
    </div>
    <form class="form form-horizontal form-tab-info" action="{{ route('account.settings.update') }}" enctype="multipart/form-data" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="info">
        <div class="row">
            <div class="col-sm-12 col-md-12 form-group">
                <label for="biography">Biografia</label>
                <textarea type="text" id="biography" class="form-control" name="biography">{{ old('biography') ?? $account->biography ?? '' }}</textarea>
                @error('biography')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="birthdate">Data de nascimento</label>
                <input type="text" id="birthdate" class="form-control" name="birthdate" value="{{ old('birthdate') ?? $account->birthdate ?? '' }}" placeholder="Data de nascimento" />
                @error('birthdate')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
{{--            <div class="col-sm-12 col-md-12 form-group">--}}
{{--                <label for="languages">Idiomas</label>--}}
{{--                <input type="text" id="languages" class="form-control" name="languages" placeholder="Idiomas" />--}}
{{--            </div>--}}
            <div class="col-sm-12 col-md-12 form-group">
                <label for="phone">Telefone</label>
                <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') ?? $account->phone ?? '' }}" placeholder="Telefone" />
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="website">Website URL</label>
                <input type="text" id="website" class="form-control" name="website" {{ old('website') ?? $account->website ?? '' }} placeholder="Website" />
                @error('website')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="gender">Gênero</label>
                <select id="gender" class="form-control" name="gender">
                    <option value="1" {{ old('gender') == 1 || $account->gender == 1 ? 'selected' : ''}}>Homem</option>
                    <option value="2" {{ old('gender') == 2 || $account->gender == 2 ? 'selected' : ''}}>Mulher</option>
                    <option value="3" {{ old('gender') == 3 || $account->gender == 3 ? 'selected' : ''}}>Outro</option>
                </select>
                @error('gender')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group text-left">
                <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
