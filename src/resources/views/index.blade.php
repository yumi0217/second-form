@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

  <div class="contact-form__content">
    <div class="contact-form__heading">
    <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group1">
      <div class="form__group-title">
      <span class="form__label--item">お名前</span>
      <span class="form__label--required">必須</span>
      </div>
      <div class="form__group-content">
      <div class="form__input--text1">
        <input type="text" name="last_name" placeholder="テスト" value="{{ old('last_name') }}" />
        <input type="text" name="first_name" placeholder="太郎" value="{{ old('first_name') }}" />
      </div>
      <div class="form-error">
        <div class="form__error1">
        @error('last_name') {{ $message }} @enderror
        </div>
        <div class="form__error2">
        @error('first_name') {{ $message }} @enderror
        </div>
      </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
      <span class="form__label--item">性別</span>
      <span class="form__label--required">必須</span>
      </div>
      <div class="form__group-content">
      <div class="form__input--radio">
        <label>
        <input type="radio" name="gender" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }}>
        男性
        </label>
        <label>
        <input type="radio" name="gender" value="female" {{ old('gender', 'female') == 'female' ? 'checked' : '' }}>
        女性
        </label>
        <label>
        <input type="radio" name="gender" value="other" {{ old('gender', 'female') == 'female' ? 'checked' : '' }}>
        その他
        </label>
      </div>
      <div class="form__error">
        @error('gender')
      {{ $message }}
    @enderror
      </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
      <span class="form__label--item">メールアドレス</span>
      <span class="form__label--required">必須</span>
      </div>
      <div class="form__group-content">
      <div class="form__input--text">
        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
      </div>
      <div class="form__error">
        @error('email')
      {{ $message }}
    @enderror
      </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
      <span class="form__label--item">電話番号</span>
      <span class="form__label--required">必須</span>
      </div>
      <div class="form__group-content">
      <div class="form__input--tel">
        <input type="text" name="tel[]" placeholder="090" value="{{ old('tel.0') }}">
        <span class="form__hyphen">-</span>
        <input type="text" name="tel[]" placeholder="1234" value="{{ old('tel.1') }}">
        <span class="form__hyphen">-</span>
        <input type="text" name="tel[]" placeholder="5678" value="{{ old('tel.2') }}">
      </div>

      <div class="form__error">
        @error('tel') {{ $message }} @enderror
      </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
      <span class="form__label--item">住所</span>
      <span class="form__label--required">必須</span>
      </div>
      <div class="form__group-content">
      <div class="form__input--text">
        <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
      </div>
      <div class="form__error">
        @error('address')
      {{ $message }}
    @enderror
      </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
      <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
      <div class="form__input--text">
        <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
      </div>
      <div class="form__error">
        @error('building')
      {{ $message }}
    @enderror
      </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
      <span class="form__label--item">お問い合わせの種類</span>
      <span class="form__label--required">必須</span>
      </div>
      <div class="form__group-content">
      <div class="form__input--select">
        <select name="inquiry_type">
        <option value="" selected>選択してください</option>
        <option value="delivery">商品のお届けについて</option>
        <option value="exchange">商品の交換について</option>
        <option value="trouble">商品トラブル</option>
        <option value="shop">ショップへのお問い合わせ</option>
        <option value="other">その他</option>
        </select>
      </div>
      <div class="form__error">
        @error('inquiry_type')
      {{ $message }}
    @enderror
      </div>
      </div>
    </div>



    <div class="form__group">
      <div class="form__group-title">
      <span class="form__label--item">お問い合わせ内容</span>
      </div>
      <div class="form__group-content">
      <div class="form__input--textarea">
        <textarea name="content" placeholder="資料をいただきたいです">{{ old('content') }}</textarea>
      </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
    </div>
    </form>
  </div>
@endsection