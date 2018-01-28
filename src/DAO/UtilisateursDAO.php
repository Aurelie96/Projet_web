<?php

namespace ECOLE\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use ECOLE\Domain\Utilisateurs;

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
     * @return \PPE_PHP_GSB\Domain\User|throws an exception if no matching user is found
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
     * @param \PPE_PHP_GSB\Domain\User $user The user to save
     */
    public function save(User $user) {
        $userData = array(
            'loginUtilisateur' => $user->getLoginUtilisateur(),
            'saltUtilisateur' => $user->getSaltUtilisateur(),
            'mdpUtilisateur' => $user->getMdpUtilisateur(),
            'roleUtilisateur' => $user->getRoleUtilisateur()
            );

        if ($user->getIdUtilisateur()) {
            // The user has already been saved : update it
            $this->getDb()->update('utilisateurs', $userData, array('idUtilisateur' => $user->getIdUtilisateur()));
        } else {
            // The user has never been saved : insert it
            $this->getDb()->insert('utilisateurs', $userData);
            // Get the id of the newly created user and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $user->setIdUtilisateur($id);
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
        return 'ECOLE\Domain\Utilisateurs' === $class;
    }

    /**
     * Creates a User object based on a DB row.
     *
     * @param array $row The DB row containing User data.
     * @return \PPE_PHP_GSB\Domain\User
     */
    protected function buildDomainObject($row) {
        $user = new User();
        $user->setIdUtilisateur($row['idUtilisateur']);
        $user->setLoginUtilisateur($row['loginUtilisateur']);
        $user->setMdpUtilisateur($row['mdpUtilisateur']);
        $user->setSaltUtilisateur($row['saltUtilisateur']);
        $user->setRoleUtilisateur($row['roleUtilisateur']);
        return $user;
    }
}