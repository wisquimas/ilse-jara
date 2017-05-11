/**
 * Estos son los que se cargan como globales
 */
//noinspection ES6UnusedImports
import Alerta from './helpers/Alerta';

/**
 * Aca se cargan los helpers o scripts que se necesiten
 */
import IniciarWeb from './helpers/IniciarWeb';
import BannerHome from './helpers/BannerHome';

/**
 * Inicio
 */

IniciarWeb.init();
BannerHome.init();

/**
 * Seteo de globales
 **/
// window.AjaxHelpers = AjaxHelpers;