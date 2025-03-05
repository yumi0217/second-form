@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
  <div class="confirm__content">
    <div class="confirm__heading">
    <h2>お問い合わせ内容確認</h2>
    </div>
    <form class="form" action="/thanks" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お名前</th>
        <td class="confirm-table__text">
        <input type="text" name="name"
          value="{{ trim($contact['last_name']) . ' ' . trim($contact['first_name']) }}" readonly />

        <!-- 隠しフィールドで送信 -->
        <input type="hidden" name="last_name" value="{{ trim($contact['last_name']) }}" readonly />
        <input type="hidden" name="first_name" value="{{ trim($contact['first_name']) }}" readonly />
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">性別</th>
        <td class="confirm-table__text">
        {{ $contact['gender'] == 'male' ? '男性' : ($contact['gender'] == 'female' ? '女性' : 'その他') }}
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">メールアドレス</th>
        <td class="confirm-table__text">
        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">電話番号</th>
        <td class="confirm-table__text">
        <input type="text" name="tel" value="{{ implode('-', $contact['tel']) }}" readonly />
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">住所</th>
        <td class="confirm-table__text">
        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">建物名</th>
        <td class="confirm-table__text">
        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせ内容</th>
        <td class="confirm-table__text">
        <input type="text" name="content" value="{{ $contact['content'] }}" readonly />
        </td>
      </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
    </div>
    </form>
  </div>
@endsection