<?php

namespace Botble\Member\Forms;

use Assets;
use Botble\Base\Forms\FormAbstract;
use Botble\Member\Http\Requests\MemberCreateRequest;
use Botble\Member\Models\Member;

class MemberForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        Assets::addScriptsDirectly(['/vendor/core/plugins/member/js/member-admin.js']);

        $this
            ->setupModel(new Member)
            ->setValidatorClass(MemberCreateRequest::class)
            ->withCustomFields()
            ->add('first_name', 'text', [
                'label'      => trans('plugins/member::member.first_name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('last_name', 'text', [
                'label'      => trans('plugins/member::member.last_name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('email', 'text', [
                'label'      => trans('plugins/member::member.form.email'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('plugins/member::member.email_placeholder'),
                    'data-counter' => 60,
                ],
            ])
            ->add('phone', 'text', [
                'label'      => trans('plugins/member::member.form.phone'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 10,
                ],
            ])
            ->add('type', 'customSelect', [ // Change "select" to "customSelect" for better UI
                'label' => __('plugins/member::member.form.phone'),
                'label_attr' => ['class' => 'control-label required'], // Add class "required" if that is mandatory field
                'choices'    => [
                    0 => __('Miên phí'),
                    1 => __('Trả phí'),
                ],
            ])
            ->add('vip_expires_at', 'text', [
                'label' => 'Thời hạn VIP',
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'class' => 'form-control datepicker',
                    'data-date-format' => 'yyyy/mm/dd',
                ],
                'default_value' => now(config('app.timezone'))->format('Y/m/d'),
            ])
            ->add('is_change_password', 'checkbox', [
                'label'      => trans('plugins/member::member.form.change_password'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'hrv-checkbox',
                ],
                'value'      => 1,
            ])
            ->add('password', 'password', [
                'label'      => trans('plugins/member::member.form.password'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 60,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ($this->getModel()->id ? ' hidden' : null),
                ],
            ])
            ->add('password_confirmation', 'password', [
                'label'      => trans('plugins/member::member.form.password_confirmation'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'data-counter' => 60,
                ],
                'wrapper'    => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ($this->getModel()->id ? ' hidden' : null),
                ],
            ]);
    }
}
