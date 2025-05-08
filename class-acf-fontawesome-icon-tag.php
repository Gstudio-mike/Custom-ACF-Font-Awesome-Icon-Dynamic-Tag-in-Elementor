<?php
namespace Elementor;

use Elementor\Core\DynamicTags\Tag;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}

class ACF_FontAwesome_Icon_Tag extends Tag {

    public function get_name() {
        return 'acf-fontawesome-icon';
    }

    public function get_title() {
        return __('ACF Font Awesome Icon', 'plugin-name');
    }

    public function get_group() {
        return 'acf';
    }

    public function get_categories() {
        return ['text'];
    }

    protected function register_controls() {
        $this->add_control(
            'field_name',
            [
                'label' => __('Nombre del Campo ACF', 'plugin-name'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => 'nombre_del_campo',
            ]
        );
    }

    public function render() {
        $field_name = $this->get_settings('field_name');

        if (empty($field_name)) {
            return;
        }

        $post_id = get_the_ID();
        $icon_class = get_field($field_name, $post_id);

        if (preg_match('/^(fa[bsrl]?) fa-[a-z0-9-]+$/', $icon_class)) {
            echo '<i class="' . esc_attr($icon_class) . '"></i>';
        }
    }
}
