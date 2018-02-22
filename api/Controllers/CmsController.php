<?php

namespace App\Controllers;

use App\Models\Referral;


class CmsController extends Controller
{

  

  // CMS List
  public function getList($request, $response) {

    $referrals_10 = Referral::where('top_10', '!=', '0')->orderBy('top_10', 'ASC')->get();
    $referrals = Referral::where('top_10', '=', '0')->orderBy('id', 'DESC')->get();

    return $this->view->render($response, 'cms/referrals-list.twig', array(
        'referrals_10' => $referrals_10,
        'referrals' => $referrals,
    ));

  }

  // CMS Create
  public function getCreate($request, $response) {

      $referrals = Referral::get();

      return $this->view->render($response, 'cms/referral-create.twig', array(
          'referrals' => $referrals,
      ));

  }

  public function postCreate($request, $response) {

    Referral::create([
      'title'        => $request->getParam('title'),
      'info'         => $request->getParam('desc'),
      'category'     => $request->getParam('category'),
      'sub_category' => $request->getParam('sub_category'),
      'preview'      => $request->getParam('image'),
      'money'        => $request->getParam('money'),
      'minimum'      => $request->getParam('minimum'),
      'commission'   => $request->getParam('commission'),
      'discount'     => $request->getParam('discount'),
      'site_url'     => $request->getParam('site_url'),
      'referral_code'=> $request->getParam('referral_code'),
    ]);

    return $response->withRedirect($this->router->pathFor('cms'));
  }

  // CMS Edit
  public function getEdit($request, $response) {
    $id = $request->getParam('id');
    $referral = Referral::find($id);

    return $this->view->render($response, 'cms/referral-edit.twig', array(
      'id'              => $referral->id,
      'title'           => $referral->title,
      'info'            => $referral->info,
      'category'        => $referral->category,
      'sub_category'    => $referral->sub_category,
      'preview'         => $referral->preview,
      'site_url'        => $referral->site_url,
      'referral_code'   => $referral->referral_code,
      'top_10'          => $referral->top_10,
      'money'           => $referral->money,
      'minimum'         => $referral->minimum,
      'commission'      => $referral->commission,
      'discount'        => $referral->discount,
    ));
  }

  public function postEdit($request, $response) {
    $id = $request->getParam('id');

    $referral = Referral::where('id', '=', $id)->update([
      'title'        => $request->getParam('title'),
      'info'         => $request->getParam('desc'),
      'category'     => $request->getParam('category'),
      'sub_category' => $request->getParam('sub_category'),
      'preview'      => $request->getParam('image'),
      'money'        => $request->getParam('money'),
      'minimum'      => $request->getParam('minimum'),
      'commission'   => $request->getParam('commission'),
      'discount'     => $request->getParam('discount'),
      'site_url'     => $request->getParam('site_url'),
      'referral_code'=> $request->getParam('referral_code'),
    ]);

    $count = Referral::where('id', '!=', $id)->where('category', '=', $request->getParam('category'))->where('top_10', '=', $request->getParam('top_10'))->count();

    if ($count > 0) {
      $referral = Referral::where('id', '!=', $id)->where('category', '=', $request->getParam('category'))->where('top_10', '=', $request->getParam('top_10'))->update([
        'top_10' => '0',
      ]);
    } else {
      $referral = Referral::where('id', '=', $id)->update([
        'top_10' => $request->getParam('top_10'),
      ]);
    }

    return $response->withRedirect($this->router->pathFor('cms'));
  }

  public function delete($request, $response) {
      $id = $request->getParam('id');
      $referral = Referral::find($id);
      $referral->delete();

      return $response->withRedirect($this->router->pathFor('cms'));
  }

}
