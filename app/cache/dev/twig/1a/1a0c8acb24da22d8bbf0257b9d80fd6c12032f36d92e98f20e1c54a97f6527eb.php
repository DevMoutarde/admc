<?php

/* ::layout.html.twig */
class __TwigTemplate_630bcd6d9c68db308c0ac993f0d6fc2bda98d93d4f7e296324b227429ecde7ab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5cebbd5ac82af08d71bf60bd68c51596a616f77825bf4cbfb867a29f99757e56 = $this->env->getExtension("native_profiler");
        $__internal_5cebbd5ac82af08d71bf60bd68c51596a616f77825bf4cbfb867a29f99757e56->enter($__internal_5cebbd5ac82af08d71bf60bd68c51596a616f77825bf4cbfb867a29f99757e56_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::layout.html.twig"));

        // line 2
        echo "
<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name =\"viewport\" content=\"width=device-width,  initial-scale=1\">
        
        <title> ";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        
        ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 15
        echo "        
        
    </head>
    
    
    <body>
        
        <div class=\"container\">
            <div class=\"jumbotron\" id=\"header\">
                <h1>ADMC Platform</h1>
                <p>
                    Portail d'entreprise
                </p>
                ";
        // line 28
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("ADMCCoreBundle:Base:menu"));
        echo "
                
            </div>
            
            
            <div class=\"row\">
                                
                <div id=\"content\" class=\"col-md-9\">
                    
                    ";
        // line 37
        $this->displayBlock('body', $context, $blocks);
        // line 39
        echo "                    

                </div>
            </div>
                    
            <hr>
            
            <footer>
                <p>Projet développé par Mr Vougny, Mr Sales, Mr Nardizzi, Mr Fourcault. DATE: ";
        // line 47
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "</p>
            </footer>
        </div>
            
        ";
        // line 51
        $this->displayBlock('javascript', $context, $blocks);
        // line 53
        echo "        
        
        
    </body>
    
</html>";
        
        $__internal_5cebbd5ac82af08d71bf60bd68c51596a616f77825bf4cbfb867a29f99757e56->leave($__internal_5cebbd5ac82af08d71bf60bd68c51596a616f77825bf4cbfb867a29f99757e56_prof);

    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        $__internal_2d0e1862fc832d7dd331bc9a3a139256e3905a36365aa38dc733cf76e5611a63 = $this->env->getExtension("native_profiler");
        $__internal_2d0e1862fc832d7dd331bc9a3a139256e3905a36365aa38dc733cf76e5611a63->enter($__internal_2d0e1862fc832d7dd331bc9a3a139256e3905a36365aa38dc733cf76e5611a63_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " ADMC ";
        
        $__internal_2d0e1862fc832d7dd331bc9a3a139256e3905a36365aa38dc733cf76e5611a63->leave($__internal_2d0e1862fc832d7dd331bc9a3a139256e3905a36365aa38dc733cf76e5611a63_prof);

    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_060e039a0a193e34ae40c69b2bad17c150b12dbca48f2e1e673dc484d4d07a8c = $this->env->getExtension("native_profiler");
        $__internal_060e039a0a193e34ae40c69b2bad17c150b12dbca48f2e1e673dc484d4d07a8c->enter($__internal_060e039a0a193e34ae40c69b2bad17c150b12dbca48f2e1e673dc484d4d07a8c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 12
        echo "            
           <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">
        ";
        
        $__internal_060e039a0a193e34ae40c69b2bad17c150b12dbca48f2e1e673dc484d4d07a8c->leave($__internal_060e039a0a193e34ae40c69b2bad17c150b12dbca48f2e1e673dc484d4d07a8c_prof);

    }

    // line 37
    public function block_body($context, array $blocks = array())
    {
        $__internal_7ff8c04b1e7cd01336dea08184456f8b1b58bb3dbce0939dc6e3632acdfac715 = $this->env->getExtension("native_profiler");
        $__internal_7ff8c04b1e7cd01336dea08184456f8b1b58bb3dbce0939dc6e3632acdfac715->enter($__internal_7ff8c04b1e7cd01336dea08184456f8b1b58bb3dbce0939dc6e3632acdfac715_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 38
        echo "                    ";
        
        $__internal_7ff8c04b1e7cd01336dea08184456f8b1b58bb3dbce0939dc6e3632acdfac715->leave($__internal_7ff8c04b1e7cd01336dea08184456f8b1b58bb3dbce0939dc6e3632acdfac715_prof);

    }

    // line 51
    public function block_javascript($context, array $blocks = array())
    {
        $__internal_ea0b15bc584deea83bf904b4f753c2e699a29dead052afdbabe009ec02e52f84 = $this->env->getExtension("native_profiler");
        $__internal_ea0b15bc584deea83bf904b4f753c2e699a29dead052afdbabe009ec02e52f84->enter($__internal_ea0b15bc584deea83bf904b4f753c2e699a29dead052afdbabe009ec02e52f84_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascript"));

        // line 52
        echo "        ";
        
        $__internal_ea0b15bc584deea83bf904b4f753c2e699a29dead052afdbabe009ec02e52f84->leave($__internal_ea0b15bc584deea83bf904b4f753c2e699a29dead052afdbabe009ec02e52f84_prof);

    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 52,  142 => 51,  135 => 38,  129 => 37,  120 => 12,  114 => 11,  102 => 9,  90 => 53,  88 => 51,  81 => 47,  71 => 39,  69 => 37,  57 => 28,  42 => 15,  40 => 11,  35 => 9,  26 => 2,);
    }
}
/* {# empty Twig template #}*/
/* */
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="utf-8">*/
/*         <meta name ="viewport" content="width=device-width,  initial-scale=1">*/
/*         */
/*         <title> {% block title %} ADMC {% endblock %}</title>*/
/*         */
/*         {% block stylesheets %}*/
/*             */
/*            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">*/
/*         {% endblock %}*/
/*         */
/*         */
/*     </head>*/
/*     */
/*     */
/*     <body>*/
/*         */
/*         <div class="container">*/
/*             <div class="jumbotron" id="header">*/
/*                 <h1>ADMC Platform</h1>*/
/*                 <p>*/
/*                     Portail d'entreprise*/
/*                 </p>*/
/*                 {{ render(controller("ADMCCoreBundle:Base:menu")) }}*/
/*                 */
/*             </div>*/
/*             */
/*             */
/*             <div class="row">*/
/*                                 */
/*                 <div id="content" class="col-md-9">*/
/*                     */
/*                     {% block body %}*/
/*                     {% endblock %}*/
/*                     */
/* */
/*                 </div>*/
/*             </div>*/
/*                     */
/*             <hr>*/
/*             */
/*             <footer>*/
/*                 <p>Projet développé par Mr Vougny, Mr Sales, Mr Nardizzi, Mr Fourcault. DATE: {{ 'now'|date('Y') }}</p>*/
/*             </footer>*/
/*         </div>*/
/*             */
/*         {% block javascript %}*/
/*         {% endblock %}*/
/*         */
/*         */
/*         */
/*     </body>*/
/*     */
/* </html>*/
