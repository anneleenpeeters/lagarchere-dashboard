<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* images.html.twig */
class __TwigTemplate_6b19d29d54ec944f83c8d8e77ac875ca1e14f68d0c523d5ff190313f782f4068 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "images.html.twig"));

        // line 1
        if ( !(null === (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 1, $this->source); })()))) {
            // line 2
            echo "    <div class=\"form-widget\">
        <div class=\"form-control kamerimages-container\">
            ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 4, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 5
                echo "                <a href=\"#\" class=\"easyadmin-thumbnail\" data-featherlight=\"#easyadmin-lightbox-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 5, $this->source); })()), "id", [], "any", false, false, false, 5), "html", null, true);
                echo "\" data-featherlight-close-on-click=\"anywhere\">
                    <img src=\"/images/kamer/";
                // line 6
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "image", [], "any", false, false, false, 6), "html", null, true);
                echo "\">
                </a>

                <div id=\"easyadmin-lightbox-";
                // line 9
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 9, $this->source); })()), "id", [], "any", false, false, false, 9), "html", null, true);
                echo "\" class=\"easyadmin-lightbox\">
                    <img src=\"/images/kamer/";
                // line 10
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "image", [], "any", false, false, false, 10), "html", null, true);
                echo "\">
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "        </div>
    </div>

";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "images.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 13,  65 => 10,  61 => 9,  55 => 6,  50 => 5,  46 => 4,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if value is not null %}
    <div class=\"form-widget\">
        <div class=\"form-control kamerimages-container\">
            {% for image in value %}
                <a href=\"#\" class=\"easyadmin-thumbnail\" data-featherlight=\"#easyadmin-lightbox-{{ item.id }}\" data-featherlight-close-on-click=\"anywhere\">
                    <img src=\"/images/kamer/{{ image.image }}\">
                </a>

                <div id=\"easyadmin-lightbox-{{ item.id }}\" class=\"easyadmin-lightbox\">
                    <img src=\"/images/kamer/{{ image.image }}\">
                </div>
            {% endfor %}
        </div>
    </div>

{% endif %}", "images.html.twig", "/Users/Anneleen/Sites/laGarchere/templates/images.html.twig");
    }
}
