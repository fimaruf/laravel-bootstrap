<?php

namespace Wovosoft\LaravelBootstrap;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Wovosoft\LaravelBootstrap\View\Components as CC;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/laravel-bootstrap.php';

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::CONFIG_PATH => config_path('laravel-bootstrap.php'),
            ], 'config');
        }
        $this->loadViewsFrom(__DIR__."/../resources/views",'laravel-bootstrap');

        $components = [
            CC\Alert::class,
            CC\Badge::class,
            CC\Breadcrumb::class,
            CC\BreadcrumbItem::class,
            CC\Button::class,
            CC\ButtonGroup::class,
            CC\ButtonToolbar::class,
            CC\Card::class,
            CC\CardBody::class,
            CC\CardFooter::class,
            CC\CardGroup::class,
            CC\CardHeader::class,
            CC\CardImg::class,
            CC\CardSubTitle::class,
            CC\CardText::class,
            CC\CardTitle::class,
            CC\Col::class,
            CC\Container::class,
            CC\DashboardLayout::class,
            CC\Dismissible::class,
            CC\Dropdown::class,
            CC\DropdownDivider::class,
            CC\DropdownForm::class,
            CC\DropdownGroup::class,
            CC\DropdownHeader::class,
            CC\DropdownItem::class,
            CC\DropdownItemButton::class,
            CC\DropdownText::class,
            CC\Embed::class,
            CC\Form::class,
            CC\FormCheckbox::class,
            CC\FormCheckboxGroup::class,
            CC\FormGroup::class,
            CC\FormGroupLabel::class,
            CC\FormInput::class,
            CC\FormInvalidFeedback::class,
            CC\FormRadio::class,
            CC\FormRadioGroup::class,
            CC\FormRow::class,
            CC\FormSelect::class,
            CC\FormTextarea::class,
            CC\FormValidFeedback::class,
            CC\Input::class,
            CC\InputColor::class,
            CC\InputDate::class,
            CC\InputEmail::class,
            CC\InputGroup::class,
            CC\InputNumber::class,
            CC\InputPassword::class,
            CC\InputRange::class,
            CC\InputSearch::class,
            CC\InputTel::class,
            CC\InputText::class,
            CC\InputTime::class,
            CC\InputUrl::class,
            CC\Jumbotron::class,
            CC\Link::class,
            CC\ListGroup::class,
            CC\ListGroupItem::class,
            CC\Nav::class,
            CC\NavDropdown::class,
            CC\NavItem::class,
            CC\NavItemDropdown::class,
            CC\Progress::class,
            CC\ProgressBar::class,
            CC\Row::class,
            CC\Spinner::class,
            CC\Tab::class,
            CC\Table::class,
            CC\Tabs::class,
            CC\Tbody::class,
            CC\Td::class,
            CC\Tfoot::class,
            CC\Th::class,
            CC\Thead::class,
            CC\Toast::class,
            CC\Tr::class

        ];
        foreach ($components as $component) {
            $array = explode('\\', $component);
            Blade::component(Str::kebab(end($array)), $component);
        }


    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'laravel-bootstrap'
        );

        $this->app->bind('laravel-bootstrap', function () {
            return new LaravelBootstrap();
        });
    }
}
