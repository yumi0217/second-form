<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function confirm(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'content']);

    // tel が配列の場合は "-" で結合
    $contact['tel'] = implode('-', $request->input('tel', []));

    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'content']);

    // 空データの場合のエラー回避
    $contact['tel'] = implode('-', $request->input('tel', []));

    Contact::create($contact);

    $contact['name'] = $contact['last_name'] . ' ' . $contact['first_name'];

    return view('thanks');
  }

  // 🛠 クラス内に移動
  public function edit(Contact $contact)
  {
    $contact->tel = explode('-', $contact->tel); // ['090', '1234', '5678'] に変換
    return view('edit', compact('contact'));
  }
}

