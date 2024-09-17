# BACK:

 - setup docker **CHECK**
 - setup symfony **CHECK**
 - installer dependance **CHECK**
 - creer les entitées **CHECK**
 - creer fichier de migration **CHECK**
 - connecter DB au projet **CHECK**
 - creer les controllers **CHECK**
 - creer fixtures
 - gerer le hash du password
 - gerer le JWT
 - implementer le refresh token
 - securiser les controllers via le ROLE
 - ...

# FRONT:

 - creer les pages principales **CHECK**
 - creer header **CHECK**
 - creer footer **CHECK**
 - creer les composants

 - CHANGER LES VALEURS EN DUR HEADER: <a href='/user/1/basket'>

# Entity:

## USER:
id
mail
password
firstName
lastName
(adresse postale?)

## PRODUCT:
id
name
shortDescription
fullDescription
price
picture
(stockQuantity?)

## COMMAND:
id
date
totalprice
user (manyToOne)
product (manyToMany)

# PAGES:

 - home **CHECK**
 - product/id **CHECK**
 - login **CHECK**
 - subscribe **CHECK**
 - panier **CHECK**
 - account **CHECK**
 - 404 **Manque la redirection**

# Components:

- navigation
- hero header
- footer
- product list
- product item
- form add product
- form login
- form subscribe
- « Déjà un compte ? Se connecter »
- panier list
- command list history

# Questions pour David:

- gerer la redirection en 404
- probleme pour installer webpack et avoir le build avec image


