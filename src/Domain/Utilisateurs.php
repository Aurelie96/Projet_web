<?php

namespace ECOLE\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Utilisateurs implements UserInterface
{

    /**
     * Utilisateurs idUtilisateur.
     *
     * @var integer
     */
    private $idUtilisateur;

    /**
     * Utilisateurs loginUtilisateur.
     *
     * @var string
     */
    private $loginUtilisateur;

    /**
     * Utilisateurs mdpUtilisateur.
     *
     * @var string
     */
    private $mdpUtilisateur;

     /**
     * Utilisateurs saltUtilisateur.
     *
     * @var string
     */
    private $saltUtilisateur;

     /**
     * Utilisateurs roleUtilisateur.
     *
     * @var string
     */
    private $roleUtilisateur;

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getLoginUtilisateur() {
        return $this->loginUtilisateur;
    }

    public function setLoginUtilisateur($loginUtilisateur) {
        $this->loginUtilisateur = $loginUtilisateur;
    }

    public function getMdpUtilisateur() {
        return $this->mdpUtilisateur;
    }

    public function setMdpUtilisateur($mdpUtilisateur) {
        $this->mdpUtilisateur = $mdpUtilisateur;
    }

    public function getSaltUtilisateur() {
        return $this->saltUtilisateur;
    }

    public function setSaltUtilisateur($saltUtilisateur) {
        $this->saltUtilisateur = $saltUtilisateur;
    }

    public function getRoleUtilisateur() {
        return $this->roleUtilisateur;
    }

    public function setRoleUtilisateur($roleUtilisateur) {
        $this->roleUtilisateur = $roleUtilisateur;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }
}