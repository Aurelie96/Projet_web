<?php

namespace Projet_web\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Projet_web\Domain\Utilisateurs;

class UtilisateursDAO extends DAO implements UserProviderInterface
{
    /**
     * Returns a list of all users, sorted by role and name.
     *
     * @return array A list of all users.
     */
    public function findAll() {
        $sql = "select * from utilisateurs order by roleUtilisateur, loginUtilisateur";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $entities = array();
        foreach ($result as $row) {
            $id = $row['idUtilisateur'];
            $entities[$id] = $this->buildDomainObject($row);
        }
        return $entities;
    }

    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id The user id.
     *
     * @return \Projet_web\Domain\Utilisateurs|throws an exception if no matching user is found
     */
    public function find($id) {
        $sql = "select * from utilisateurs where idUtilisateur=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas d'id correspondant " . $id);
    }

    /**
     * Saves a user into the database.
     *
     * @param \Projet_web\Domain\Utilisateurs $user The user to save
     */
    public function save(User $user) {
        $userData = array(
            'loginUtilisateur' => $user->getUsername(),
            'saltUtilisateur' => $user->getSalt(),
            'mdpUtilisateur' => $user->getPassword(),
            'roleUtilisateur' => $user->getRole()
            );

        if ($user->getId()) {
            // The user has already been saved : update it
            $this->getDb()->update('utilisateurs', $userData, array('idUtilisateur' => $user->getId()));
        } else {
            // The user has never been saved : insert it
            $this->getDb()->insert('utilisateurs', $userData);
            // Get the id of the newly created user and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $user->setId($id);
        }
    }

    /**
     * Removes an user from the database.
     *
     * @param integer $id The user id.
     */
    public function delete($id) {
        // Delete the user
        $this->getDb()->delete('utilisateurs', array('idUtilisateur' => $id));
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        $sql = "select * from utilisateurs where loginUtilisateur=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('Utilisateur "%s" non trouvé.', $username));
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Les instances de "%s" ne sont pas supportées.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'Projet_web\Domain\Utilisateurs' === $class;
    }

    /**
     * Creates a User object based on a DB row.
     *
     * @param array $row The DB row containing User data.
     * @return \Projet_web\Domain\Utilisateurs
     */
    protected function buildDomainObject($row) {
        $user = new Utilisateurs();
        $user->setId($row['idUtilisateur']);
        $user->setUsername($row['loginUtilisateur']);
        $user->setPassword($row['mdpUtilisateur']);
        $user->setSalt($row['saltUtilisateur']);
        $user->setRole($row['roleUtilisateur']);
        return $user;
    }
}