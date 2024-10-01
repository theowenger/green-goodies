# BACK:

 - setup docker **CHECK**
 - setup symfony **CHECK**
 - installer dependance **CHECK**
 - creer les entitées **CHECK**
 - creer fichier de migration **CHECK**
 - connecter DB au projet **CHECK**
 - creer les controllers **CHECK**
 - creer fixtures **CHECK**
 - gerer le hash du password **CHECK**
- securiser les controllers via le ROLE !!! **CHECK**
  - gerer la config de webpack pour minifier CSS + JS
- gerer le JWT **CHECK**
- implementer le refresh token
- si le temps, ameliorer les fixtures pour + d'aleatoire
- ...

# FRONT:

 - creer les pages principales **CHECK**
 - creer header **CHECK**
 - creer footer **CHECK**
 - creer les composants **CHECK**
 - CHANGER LES VALEURS EN DUR HEADER: **CHECK**
 - pour l'ecart sur la list porudct, **CHECK**

# Components:

- navigation **CHECK**
- hero header **CHECK**
- footer **CHECK**
- product list **CHECK**
- product item **CHECK**
- form login VOIR MAKE:AUTHENTICATE **CHECK**
- form subscribe **CHECK**
- « Déjà un compte ? Se connecter »
- panier list **CHECK**
- command list history **CHECK**

# Questions pour David:

- gerer la redirection en 404

# Entity:

## USER:
REFAIRE LA CLASSE AVEC make:user **CHECK**
id **CHECK**
mail **CHECK**
password **CHECK**
firstName **CHECK**
lastName **CHECK**
adresse postale **CHECK**
ROLES **CHECK**
Rajouter isAPIActivated en attribut true/false, pas default FALSE


## PRODUCT:
id
name
shortDescription
fullDescription
price
picture

## COMMAND:
id
date
totalprice
user (manyToOne)
product (manyToMany)
Si + plus de temps, stocker le prix du produit a l'achat 
dans command_product

# PAGES:

 - home **CHECK**
 - product/id **CHECK**
 - login **CHECK**
 - subscribe **CHECK**
 - panier **CHECK**
 - account **CHECK**
 - 404 **Manque la redirection**
