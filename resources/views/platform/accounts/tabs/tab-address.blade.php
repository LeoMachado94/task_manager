<div class="tab-pane {{ request()->query('tab') === 'address' ? 'active' : '' }}" id="tab-address" role="tabpanel" aria-labelledby="tab-address-area">
    <div class="row">
        <div class="col-md-12 mb-1">
            <h4><i data-feather="map-pin"></i> Endereço</h4>
        </div>
    </div>
    <form class="form form-horizontal form-tab-address" action="{{ route('account.settings.update') }}" enctype="multipart/form-data" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="address">
        <div class="row">
            <div class="col-sm-12 col-md-6 form-group">
                <label for="address">Endereço</label>
                <input type="text" id="address" class="form-control" name="address" value="{{ old('address') ?? $account->personalAddress()->address ?? '' }}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-6 form-group">
                <label for="address_number">Número</label>
                <input type="number" id="address_number" class="form-control" name="address_number" value="{{ old('address_number') ?? $account->personalAddress()->address_number ?? '' }}">
                @error('address_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-6 form-group">
                <label for="address_district">Bairro</label>
                <input type="text" id="address_district" class="form-control" name="address_district" value="{{ old('address_district') ?? $account->personalAddress()->address_district ?? '' }}">
                @error('address_district')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-6 form-group">
                <label for="address_complement">Complemento</label>
                <input type="text" id="address_complement" class="form-control" name="address_complement" value="{{ old('address_complement') ?? $account->personalAddress()->address_complement ?? '' }}">
                @error('address_complement')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="address_city">Cidade</label>
                <input type="text" id="address_city" class="form-control" name="address_city" placeholder="Cidade" value="{{ old('address_city') ?? $account->personalAddress()->address_city ?? '' }}">
                @error('address_city')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="address_state">Estado <small>(sigla. ex.: SP, SC, RS)</small></label>
                <input type="text" id="address_state" class="form-control" name="address_state" placeholder="Estado" maxlength="2" value="{{ old('address_state') ?? $account->personalAddress()->address_state ?? '' }}">
                @error('address_state')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group">
                <label for="address_country">País</label>
                <input type="text" id="address_country" class="form-control" name="address_country" value="Brasil" placeholder="País" readonly>
                @error('address_country')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-12 form-group text-left">
                <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
